<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EmailTemplatesController extends Controller {


    public function index(){
        return Inertia::render('EmailTemplates/Index', [
            'title' => 'Email Templates',
            'filters' => Request::all('search'),
            'templates' => EmailTemplate::orderBy('name')
                ->filter(Request::only('search'))
                ->paginate(10)
                ->withQueryString()
                ->through(function ($template) {
                    return [
                        'id' => $template->id,
                        'name' => $template->name,
                        'language' => $template->en,
                        'details' => $template->details,
                        'slug' => $template->slug,
                        'html' => $template->html,
                    ];
                } ),
        ]);
    }

    public function edit(EmailTemplate $emailTemplate){
        return Inertia::render('EmailTemplates/Edit', [
            'title' => $emailTemplate->name,
            'template' => [
                'id' => $emailTemplate->id,
                'name' => $emailTemplate->name,
                'details' => $emailTemplate->details,
                'language' => $emailTemplate->en,
                'slug' => $emailTemplate->slug,
                'html' => $emailTemplate->html,
            ],
        ]);
    }

    public function update(EmailTemplate $emailTemplate)
    {
        $emailTemplate->update(
            Request::validate([
                'html' => ['required'],
            ])
        );

        return Redirect::back()->with('success', 'Email template updated.');
    }
}
