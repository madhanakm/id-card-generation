<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfCustomer;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Models\FrontPage;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class FrontPagesController extends Controller {

    public function __construct(){
        $this->middleware(RedirectIfCustomer::class);
    }

    public function page($slug){
        $page = FrontPage::where('slug', $slug)->first();
        $components = [
            'home' => 'FrontPages/Home',
            'contact' => 'FrontPages/Contact',
            'privacy' => 'FrontPages/PrivacyPolicy',
            'terms' => 'FrontPages/TermsOfServices',
            'section' => 'FrontPages/Section',
        ];
        if(empty($components[$slug])){
            return abort(404);
        }
        return Inertia::render($components[$slug], [
            'title' => $page?$page->title:'',
            'page' => $page,
        ]);
    }

    public function update($slug){
        $requests = Request::validate([
            'title' => ['required'],
            'slug' => ['required', 'max:50'],
            'is_active' => ['nullable'],
            'html' => ['required']
        ]);

        $requests['html'] = json_encode($requests['html']);

        $page = FrontPage::where('slug', $slug)->first();
        if(!empty($page)){
            $page->update($requests);
        }else{
            FrontPage::create($requests);
        }
        return Redirect::back()->with('success', $requests['title'].' updated.');
    }

    public function uploadImage(){
        $file_path = '';
        if(Request::hasFile('image')){
            $image = Request::file('image');
            $file_path = $image->store('pages', ['disk' => 'image']);
        }
        return response()->json(['image' => $file_path ?'/images/'.$file_path : '']);
    }
}
