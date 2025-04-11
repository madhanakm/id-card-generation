<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use App\Models\Language;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class LanguagesController extends Controller {

    public function index(){
        return Inertia::render('Languages/Index', [
            'title' => 'Languages',
            'filters' => Request::all('search'),
            'languages' => Language::orderBy('name')
                ->filter(Request::only('search'))
                ->paginate(10)
                ->withQueryString()
                ->through(function ($language) {
                    return [
                        'id' => $language->id,
                        'name' => $language->name,
                        'code' => $language->code,
                    ];
                } ),
        ]);
    }

    public function edit(Language $language){
        $language_file = lang_path($language->code . '.json');
        $decoded_file = json_decode(file_get_contents($language_file), true);
        $languageData = [];
        foreach ($decoded_file as $dfk => $dfv){
            $languageData[] = ['name' => $dfk, 'value' => $dfv];
        }
        return Inertia::render('Languages/Edit', [
            'title' => $language->name,
            'language_data' => [
                'id' => $language->id,
                'name' => $language->name,
                'code' => $language->code,
                'data' => $languageData,
            ],
        ]);
    }

    public function update(Language $language) {
        $languageData = Request::input('language_values');

        $decodedData = [];
        foreach ($languageData as $dataValue){
            $decodedData[$dataValue['name']] = $dataValue['value'];
        }

        $languagePath = lang_path($language->code . '.json');
        file_put_contents($languagePath, json_encode($decodedData, JSON_UNESCAPED_UNICODE));

        return Redirect::back()->with('success', 'Language data updated!');
    }
}
