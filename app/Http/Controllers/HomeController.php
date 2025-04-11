<?php

namespace App\Http\Controllers;

use App\Imports\CsvImport;
use App\Models\Card;
use App\Models\CardField;
use App\Models\FrontPage;
use App\Models\Log;
use App\Models\User;
use App\Traits\GetUserBrowser;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    use GetUserBrowser;
    public function index(){
        return Inertia::render('Home/Index', [
            'title' => 'Card Information',
//            'card_fields' => FrontPage::where('slug', 'card_fields')->first(),
            'card_fields' => CardField::where('is_active', 1)->get()->toArray(),
            'custom_cards' => Card::orderBy('created_at', 'desc')->get(),
            'footer' => FrontPage::where('slug', 'footer')->first(),
        ]);
    }

    public function setLocale($language){
        $rtlCodes = ['sa'];
        $user = Auth()->user();
        Session()->put('locale', $language);
        Session()->put('dir', in_array($language, $rtlCodes) ? 'rtl' : 'ltr');
        User::where('id', $user['id'])->update(['locale' => $language]);
        return redirect()->back();
    }

    public function createQr(){
        $cardData = Request::input('data');
        $images = [];
        $inc = 1;
        if(!empty($cardData)){
            foreach ($cardData as $card){
                $svg = QrCode::format('svg')->encoding('UTF-8')->size(400)->generate($card['name']);
                $images[$card['index']] = $svg->toHtml();
                $inc+=1;
            }
        }
        return response()->json(['images' => $images]);
    }

    public function generateQr(){
        $text = Request::input('text');
        $image = null;
        if(!empty($text)){
            $svg = QrCode::format('svg')->encoding('UTF-8')->size(400)->generate($text);
            $image = $svg->toHtml();
        }
        return response()->json(['image' => $image]);
    }

    public function importFile(){
        $file = Request::file('file');
        $csv = [];
        if(isset($file) && !empty($file)){
            $rows = Excel::toArray(new CsvImport, $file);
            $csv = $rows[0];
        }
        return response()->json(['csv' => $csv]);
    }

    private function extractZip($path){
        $photo_dir = public_path('files/photos/');
        File::cleanDirectory($photo_dir);
        $zip = new \ZipArchive;
        if($zip->open($path)) {
            for( $i = 0; $i < $zip->numFiles; $i++ ){
                $content = $zip->statIndex( $i );
                $content_name = trim(substr($content['name'], strrpos($content['name'], '/') + 1));
                if(in_array(strtolower(pathinfo($content_name, PATHINFO_EXTENSION)), ['png','jpg','jpeg','gif'])){
                    $content = $zip->getFromIndex($i);
                    file_put_contents($photo_dir.$content_name, $content);
                }
            }
        }
        $zip->close();
    }



    private function readPhotos(){
        $photos = File::allFiles(public_path('files/photos'));
        $data = [];
        foreach($photos as $photo){
            $file = pathinfo($photo);
            if(in_array($file['extension'], ['jpg','jpeg','gif','png','svg'])){
                $data[] = ['student_name' => $file['filename'], 'photo' => '/files/photos/'.$file['basename']];
            }
        }
        return $data;
    }

    private function formatName($name){
        $name = strtolower($name);
        $name = preg_replace('/[^a-z0-9 -]+/', '', $name);
        $name = str_replace(' ', '_', $name);
        return trim($name, '_');
    }

    public function csv_to_array($filename = '') {
        if (!file_exists($filename) || !is_readable($filename))
            return FALSE;
        $file = fopen($filename, 'r');
        $csvData = [];
        while (($line = fgetcsv($file)) !== FALSE) {
            $csvData[] = $line;
        }
        fclose($file);
        $header = ['name', 'profession', 'email', 'phone', 'website', 'company', 'location'];
        $data = [];
        foreach ($csvData as $cdk => $cdv){
            $item = [];
            if($cdk === 0){
                $match_header = array_intersect($header, $cdv);
                if(count($match_header) > 3){
                    continue;
                }
            }
            foreach ($header as $hk => $hv){
                if(!is_null($cdv[$hk]) && $cdv[$hk] !== '') $item[$hv] = $cdv[$hk];
            }
            $data[] = $item;
        }
        return $data;
    }

    public function saveUserData(){
        $log = [];
        $log['ip']      = Request::ip();
        $log['browser'] = $this->getBrowser(Request::header('user-agent'));
        $log['platform']= $this->getPlatForm(Request::header('user-agent'));
        $logData = Log::create($log);
        return response()->json(['log' => $logData]);
    }
}
