<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfCustomer;
use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Log;
use App\Models\Note;
use App\Models\Organization;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class DashboardController extends Controller {
    public function __construct(){
        $this->middleware(RedirectIfCustomer::class);
    }
    public function index() {
        $user = Auth()->user();
//        $log = DB::table('logs')
//            ->select('browser', DB::raw('count(browser) as browsers'))
//            ->groupBy('browser')
//            ->pluck('total','browser');
        $periods = CarbonPeriod::create( Carbon::now()->subDays(15), Carbon::now());


        $dates = [];
        $visits = [];
        foreach ($periods as $period) {
            $dates[] =  $period->format('d M Y');
            $visits[$period->format('Y-m-d')] = 0;
        }
        $logs = DB::table('logs')
            ->select([DB::raw('count(*) as total'), DB::raw('DATE(created_at) as date')])
            ->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))
            ->groupBy('date')
            ->get();

        foreach ($logs as $log){
            if(isset($visits[$log->date]) && $log->total){
                $visits[$log->date] = (int)$log->total;
            }

        }

        return Inertia::render('Dashboard/Index', [
            'title' => 'Dashboard',
            'total' => [
                'contacts' => Contact::count(),
                'organizations' => Organization::count(),
                'notes' => Note::count(),
            ],
            'visitors' => array_values($visits),
            'labels' => $dates
        ]);
    }

    public function setLocale($language){
        $user = Auth()->user();
        Session()->put('locale', $language);
        User::where('id', $user['id'])->update(['locale' => $language]);
        return redirect()->back();
    }

    public function editProfile() {
        $user_id = Auth()->id();
        $user = User::where('id', $user_id)->first();

        return Inertia::render('Users/EditProfile', [
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
}
