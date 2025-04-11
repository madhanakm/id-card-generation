<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardField;
use App\Models\Contact;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class CardsController extends Controller
{
    //

    public function index(Request $request){
        $user_id = Auth()->id();
        return Inertia::render('Cards/Index', [
            'title' => 'Custom Cards',
            'filters' =>$request->all(),
            'cards' => Card::byUser($user_id)
                ->orderBy('title')
                ->filter($request->only('search'))
                ->paginate(15)
                ->withQueryString()
                ->through(function ($note) {
                    return [
                        'id' => $note->id,
                        'type' => $note->type,
                        'user_id' => $note->user_id,
                        'title' => $note->title,
                        'background' => $note->background,
                        'color' => $note->color,
                        'html' => $note->html,
                        'css' => $note->css,
                        'border_radius' => $note->border_radius,
                        'is_active' => $note->is_active,
                        'created_at' => $note->created_at,
                    ];
                } ),
        ]);
    }

    public function edit(Card $card)
    {
        {
            return Inertia::render('Cards/Create', [
                'title' => $card->title,
                'card_fields' => CardField::all(),
                'card_info' => $card,
            ]);
        }
    }
    public function create()
    {
        return Inertia::render('Cards/Create', [
            'title' => 'Create a new card design',
            'card_fields' => CardField::all()
        ]);
    }

    public function store(Request $request)
    {
        $user_id = Auth()->id();
        $card = Card::where('id', $request->input('id'))->first();
        $message = "Card created!";

        if(!empty($card)){
            $card->update(
                $request->validate([
                    'type' => ['required', 'max:50'],
                    'title' => ['required', 'max:50'],
                    'color' => ['nullable'],
                    'html' => ['nullable'],
                    'css' => ['nullable'],
                    'border_radius' => ['nullable'],
                    'is_active' => ['required'],
                ])
            );
            $message = "Card updated!";
        }else{
            $card = Card::create($request->validate([
                'type' => ['required', 'max:50'],
                'title' => ['required', 'max:50'],
                'color' => ['nullable'],
                'html' => ['nullable'],
                'css' => ['nullable'],
                'border_radius' => ['nullable'],
                'is_active' => ['required'],
            ])
            );
        }

        if($request->file('background')){
            $card->background = '/files/'.$request->file('background')->store('users', ['disk' => 'file_uploads']);
        }
        $card->user_id = $user_id;
        $card->save();

        return Redirect::route('cards')->with('success', $message);
    }
}
