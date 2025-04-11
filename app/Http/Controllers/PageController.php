<?php

namespace App\Http\Controllers;

use App\Events\ContactMessage;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\FrontPage;
use App\Models\KnowledgeBase;
use App\Models\Type;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PageController extends Controller {

    public function blog(){
        return Inertia::render('Landing/Blog/Index', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => 'Blogs & News',
            'posts' => Blog::where('is_active', '1')->orderBy('title')
                ->filter(Request::only('search'))
                ->paginate(6)
                ->withQueryString()
                ->through(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'type' => $post->type?$post->type->name:'',
                        'typeId' => $post->type_id,
                        'image' => $post->image,
                        'details' => strip_tags($post->details),
                        'created_at' => $post->created_at,
                    ];
                } ),
        ]);
    }

    public function blogByType($typeId){
        $type = Type::where('id', $typeId)->first();
        return Inertia::render('Landing/Blog/ByType', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => 'Blog posts',
            'type' => $type,
            'posts' => Blog::where('type_id', $type->id)->orderBy('title')
                ->filter(Request::only('search'))
                ->paginate(9)
                ->withQueryString()
                ->through(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'isActive' => $post->is_active?'Yes':'No',
                        'type' => $post->type?$post->type->name:'',
                        'typeId' => $post->type_id,
                        'image' => $post->image,
                        'details' => strip_tags($post->details),
                        'created_at' => $post->created_at,
                    ];
                } ),
        ]);
    }

    public function blogDetails(Blog $post){
        return Inertia::render('Landing/Blog/Details', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => $post->title,
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'is_active' => $post->is_active,
                'author_id' => $post->author_id,
                'author' => $post->author?? null,
                'type_id' => $post->type_id,
                'image' => $post->image,
                'details' => $post->details,
                'created_at' => $post->created_at,
            ],
            'types' => Type::whereHas('posts')->get(),
            'recent_posts' => Blog::where( 'id', '!=', $post->id )
                ->orderBy('created_at','desc')
                ->limit(5)
                ->get()
                ->map
                ->only('id', 'title', 'created_at', 'details', 'image'),
            'related_posts' => Blog::where('type_id', $post->type_id)
                ->where( 'id', '!=', $post->id )
                ->orderBy('created_at','desc')
                ->limit(3)
                ->get()
                ->map
                ->only('id', 'title', 'created_at', 'details', 'image')
        ]);
    }

    public function kb(){

        return Inertia::render('Landing/KnowledgeBase/Index', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'types' => Type::orderBy('name')->get()->map->only('id', 'name'),
            'filters' => Request::only('search'),
            'kb' => KnowledgeBase::orderBy('title')
                ->filter(Request::only('search'))
                ->paginate(9)
                ->withQueryString()
                ->through(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'type' => $post->type?$post->type->name:'',
                        'typeId' => $post->type_id,
                        'details' => strip_tags($post->details),
                    ];
                } ),
        ]);
    }

    public function faq(){
        return Inertia::render('Landing/FAQ', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => 'FAQs',
            'filters' => Request::only('search'),
            'faqs' => Faq::orderBy('name')
                ->filter(Request::only('search'))
                ->paginate(100)
                ->withQueryString()
                ->through(function ($faq) {
                    return [
                        'id' => $faq->id,
                        'name' => $faq->name,
                        'details' => $faq->details,
                        'active' => false,
                    ];
                }),
        ]);
    }

    public function kbDetails(KnowledgeBase $kb_item){
        return Inertia::render('Landing/KnowledgeBase/Details', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => $kb_item->title,
            'kb' => [
                'id' => $kb_item->id,
                'title' => $kb_item->title,
                'type' => $kb_item->type?$kb_item->type->name:'',
                'typeId' => $kb_item->type_id,
                'details' => $kb_item->details,
            ],
            'types' => Type::whereHas('kb')->get(),
            'random_kb' => KnowledgeBase::where( 'id', '!=', $kb_item->id )
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->map
                ->only('id', 'title')
        ]);
    }

    public function privacy(){
        $page = FrontPage::where('slug', 'privacy')->first();
        return Inertia::render('Landing/PrivacyPolicy', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => $page->title,
            'data' => $page
        ]);
    }

    public function contact(){
        $page = FrontPage::where('slug', 'contact')->first();
        return Inertia::render('Landing/Contact', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => $page->title,
            'data' => $page
        ]);
    }

    public function about(){

        return Inertia::render('Landing/AboutUs', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'data' => []
        ]);
    }

    public function services(){
        $page = FrontPage::where('slug', 'services')->first();
        return Inertia::render('Landing/Services', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => $page->title,
            'data' => $page
        ]);
    }

    public function team(){

        return Inertia::render('Landing/Team', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'data' => []
        ]);
    }

    public function terms(){
        $page = FrontPage::where('slug', 'terms')->first();
        return Inertia::render('Landing/TermsOfServices', [
            'footer' => FrontPage::where('slug', 'footer')->first(),
            'title' => $page->title,
            'data' => $page
        ]);
    }

    public function contactPost(){
        $contact_data = Request::validate([
            'name' => ['required', 'max:40'],
            'email' => ['required', 'max:60', 'email'],
            'phone' => ['nullable', 'max:20'],
            'message' => ['required'],
        ]);

        event(new ContactMessage(['email' => $contact_data['email'], 'name' => $contact_data['name'], 'phone' => $contact_data['phone'], 'message' => $contact_data['message']]));
        return Redirect::back()->with('success', 'Your message has been sent!');
    }
}
