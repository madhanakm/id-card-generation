<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Http\Middleware\RedirectIfCustomer;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Models\Attachment;
use App\Models\Blog;
use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Message;
use App\Models\Note;
use App\Models\Review;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UsersController extends Controller{
    public function __construct(){
        $this->middleware(RedirectIfCustomer::class);
    }
    public function index(){
        return Inertia::render('Users/Index', [
            'title' => 'Users',
            'filters' => Request::all(['search', 'trashed']),
            'users' => User::orderByName()
                ->filter(Request::all(['search', 'trashed']))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'country' => $user->country_id ? $user->country->name: null,
                    'city' => $user->city,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'role' => $user->role,
                    'photo' => $user->photo_path ?? null,
                    'deleted_at' => $user->deleted_at,
                ]),
        ]);
    }

    public function create(){
        return Inertia::render('Users/Create',[
            'title' => 'Create a new user',
            'countries' => Country::orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'cities' => City::orderBy('name')
                ->get()
                ->map
                ->only('id', 'name')
        ]);
    }

    public function store(){
        $userRequest = Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'phone' => ['nullable', 'max:25'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => ['nullable'],
            'city' => ['nullable'],
            'address' => ['nullable'],
            'country_id' => ['nullable'],
        ]);
        $admin_role = Role::where('slug', 'admin')->first();
        $userRequest['role_id'] = !empty($admin_role)? $admin_role->id : 1;

        if(Request::file('photo')){
            $userRequest['photo_path'] = '/files/'.Request::file('photo')->store('users', ['disk' => 'file_uploads']);
        }
        $user = User::create($userRequest);

//        event(new UserCreated(['id' => $user->id, 'password' => $userRequest['password']]));

        return Redirect::route('users')->with('success', 'User created.');
    }

    public function edit(User $user) {
        $a_user = Auth()->user();

        return Inertia::render('Users/Edit', [
            'title' => $user->name,
            'user' => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role,
                'city' => $user->city,
                'address' => $user->address,
                'country_id' => $user->country_id,
                'photo' => $user->photo_path ?? null,
                'photo_path' => $user->photo_path ?? null,
                'deleted_at' => $user->deleted_at,
            ],
            'countries' => Country::orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'cities' => City::orderBy('name')
                ->get()
                ->map
                ->only('id', 'name')
        ]);
    }

    public function update(User $user) {
        if (config('app.demo')) {
            return Redirect::back()->with('error', 'Updating user is not allowed for the live demo.');
        }

        Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'phone' => ['nullable', 'max:25'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable'],
            'city' => ['nullable'],
            'address' => ['nullable'],
            'country_id' => ['nullable'],
            'photo' => ['nullable', 'image'],
        ]);

        $user->update(Request::only(['first_name', 'last_name', 'phone', 'email', 'city', 'address', 'country_id']));

        if(Request::file('photo')){
            if(isset($user->photo_path) && !empty($user->photo_path) && File::exists(public_path($user->photo_path))){
                File::delete(public_path($user->photo_path));
            }
            $user->update(['photo_path' => '/files/'.Request::file('photo')->store('users', ['disk' => 'file_uploads'])]);
        }

        if (Request::get('password')) {
            $user->update(['password' => Request::get('password')]);
        }

        return Redirect::back()->with('success', 'Profile updated.');
    }

    public function destroy(User $user) {

        if (config('app.demo')) {
            return Redirect::back()->with('error', 'Deleting user is not allowed for the live demo.');
        }

        $user->delete();
        return Redirect::back()->with('success', 'User deleted!');
    }
    public function restore(User $user){
        $user->restore();
        return Redirect::back()->with('success', 'User restored!');
    }
}
