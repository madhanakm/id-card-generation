<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfCustomer;
use App\Models\CardField;
use App\Models\FrontPage;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class SettingsController extends Controller {

    public function __construct(){
        $this->middleware(RedirectIfCustomer::class);
    }

    public function index(){
        $settings = Setting::orderBy('id')->get();
        $card_fields = CardField::get()->toArray();

        $settingData = [];
        foreach ($settings as $setting){
            $settingData[$setting['slug']] = ['id' => $setting->id, 'name' => $setting->name, 'slug' => $setting->slug, 'type' => $setting->type, 'value' => $setting->value];
            if($setting->type === 'json'){
                $settingData[$setting['slug']]['value'] = $setting->value? json_decode($setting->value, true): null;
            }
        }
        return Inertia::render('Settings/Index', [
            'title' => 'Global Settings',
            'settings' => $settingData,
            'card_fields' => $card_fields,
            'languages' => Language::orderBy('name')
                ->get()
                ->map
                ->only('code', 'name'),
        ]);
    }

    public function update(){
        $requests = Request::all();

        if (config('app.demo')) {
            return Redirect::back()->with('error', 'Updating global settings are not allowed for the live demo.');
        }

        if(!empty($requests['card_fields'])){
            foreach ($requests['card_fields'] as $card_field){
                CardField::where('id', $card_field['id'])->update($card_field);
            }
        }

        unset($requests['card_fields']);
        $jsonFields = ['hide_ticket_fields'];

        foreach ($requests as $requestKey => $requestValue){
            $setting = Setting::where('slug', $requestKey)->first();
            if(isset($setting)){
                $setting->value = $setting->type == 'json' ? json_encode($requestValue) : $requestValue;
                $setting->save();
            }else{
                Setting::create([
                    'slug' => $requestKey,
                    'name' => ucfirst(preg_replace('/\s+/', '_', $requestKey)),
                    'type' => in_array($requestKey, $jsonFields)? 'json' : 'text',
                    'value' => in_array($requestKey, $jsonFields)? json_encode($requestValue) : $requestValue,
                ]);
            }
        }

        if(Request::file('logo')){
            Request::file('logo')->storeAs('/', 'logo.png', ['disk' => 'image']);
        }

        if(Request::file('logo_white') && !empty(Request::file('logo_white'))){
            Request::file('logo_white')->storeAs('/', 'logo_white.png', ['disk' => 'image']);
        }

        return Redirect::back()->with('success', 'Settings updated.');
    }

    public function smtp(){
        $env = DotenvEditor::load();
        $keys = $env->getKeys(['MAIL_HOST','MAIL_PORT','MAIL_USERNAME','MAIL_PASSWORD','MAIL_ENCRYPTION','MAIL_FROM_ADDRESS','MAIL_FROM_NAME']);
        return Inertia::render('Settings/Smtp', [
            'title' => 'SMTP Settings',
            'keys' => $keys,
        ]);
    }

    public function artisan($slug){
        Artisan::call($slug, [ '--force' => true ]);
        print_r('done');exit;
    }

    public function updateSmtp(){
        $mailVariables = Request::validate([
            'MAIL_HOST' => ['required'],
            'MAIL_PORT' => ['required'],
            'MAIL_USERNAME' => ['required'],
            'MAIL_PASSWORD' => ['required'],
            'MAIL_ENCRYPTION' => ['required'],
            'MAIL_FROM_ADDRESS' => ['nullable', 'email'],
            'MAIL_FROM_NAME' => ['nullable'],
        ]);
        $this->setEnvVariables($mailVariables);
        return Redirect::back()->with('success', 'SMTP configuration updated!');
    }

    private function setEnvVariables($data) {
        $env = DotenvEditor::load();
        foreach ($data as $data_key => $data_value){
            $env->setKey($data_key, $data_value);
        }
        $env->save();
    }


    public function clearCache($slug){
        // php artisan optimize && php artisan cache:clear && php artisan route:cache && php artisan view:clear && php artisan config:cache
        $slugArray = [
            'config' => 'config:cache', 'optimize' => 'optimize', 'cache' => 'cache:clear',
            'route' => 'route:cache', 'view' => 'view:clear'
        ];
        if(isset($slugArray[$slug])){
            Artisan::call($slugArray[$slug]);
        }elseif($slug == 'all'){
            Artisan::call('optimize');
            Artisan::call('cache:clear');
            Artisan::call('route:cache');
            Artisan::call('view:clear');
            Artisan::call('config:cache');
            Artisan::call('clear-compiled');
        }
        return response()->json(['success'=>true]);
    }
}
