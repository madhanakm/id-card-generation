<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class BackupController extends Controller {
    public function restore(){
        dd('don!');
    }

    const BASE_URL = 'https://gitlab.com';
    const TOKEN = 'glpat-EUzZmNbAPDhwz7ZWRviV';
    const TOKEN_FULL = 'Bearer glpat-EUzZmNbAPDhwz7ZWRviV';

    private function import_sql($file) {
        $sql_path = base_path('database/backup/'.$file.'.sql');
        DB::unprepared(file_get_contents($sql_path));
    }

    protected function getVersionAvailable($current){
        $headers = [
            'PRIVATE-TOKEN' => self::TOKEN,
        ];
        $response = Http::withHeaders($headers)->get(self::BASE_URL.'/api/v4/projects/41913859/repository/tags');
        $releaseCollection = collect(\json_decode($response->body()));
        $tag = $releaseCollection->first();
        if(!empty($tag)){
            if (version_compare($current, $tag->name, '<')) {
                return $tag->name;
            }
        }
        return false;
    }

    public function checkUpdate(){
        dd('ok');
        $env = DotenvEditor::load();
        $current_tag = $env->getValue('VERSION');
        try {
//            $new_tag = $this->getVersionAvailable($current_tag);
            $new_tag = "v3.56";
            if($new_tag) {
                $headers = [ 'Authorization' => 'Bearer '.self::TOKEN ];
                $res = Http::withHeaders($headers)->get('https://gitlab.com/api/v4/projects/41913859/repository/compare?from='.$current_tag.'&to='.$new_tag);
                $json = $res->json();
                $diffs = $json['diffs'];
                $raw = Http::withHeaders($headers)->get('https://gitlab.com/api/v4/projects/41913859/repository/files/'.urlencode($diffs[2]['new_path']).'/raw?ref='.$new_tag)->body();
                if(gettype($raw) == 'string'){
                    File::put(base_path($diffs[2]['new_path']), $raw);
                }
                dd('success!');
                foreach ($diffs as $diff){
                    $path = $diff['new_path'];
                    $raw = Http::withHeaders($headers)->get('https://gitlab.com/api/v4/projects/41913859/repository/files/'.urlencode($path).'/raw?ref='.$new_tag)->body();
                    if(gettype($raw) == 'string'){
                        File::put(base_path($path), $raw);
                    }
                    sleep(1);
                }
            }
            $env->setKey('VERSION', $new_tag);
            dd('updated!');
        } catch (\Throwable $e) {
            report($e);
            dd($e);
        }
    }
}
