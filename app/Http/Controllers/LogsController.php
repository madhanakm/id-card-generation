<?php

namespace App\Http\Controllers;

use App\Imports\CsvImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LogsController extends Controller {
    public function test(){
//        $english_test = "Good Morning,Good Noon,Good Afternoon,Good Evening,Hello,Edit Profile,Logout,Dashboard,Generated Cards by Date,User Count,Contacts,Organizations,Notes,Search,Search...,Name,Details,Submit,Cancel,note details here..,delete,Contacts,Trash,Trashed,Clear,Create New,Name,Email,City,Phone,First name,Last name,last name,Title,Organization,Email,Phone,Address,City,Country,Delete Contact,Update Contact,Organizations,Create Organization,Province,State,Country,Postal code,Update Organization,Delete Organization,Users,Create New,Password,Photo,Delete User,Update User,App Name,Settings,Manage Users,Global,Languages,Default Language,Logo,Save,Browse,Code,Reset,Card information,Choose design,Review card info,Print preview,Type your card information as following!,Name,Profession,Email,Phone,Website,Company Name,Location,Check this if want to import data from CSV or Excel file.,You may download example formatted csv file which may help to import data properly.,Next,Portrait Card Layout,Landscape Card Layout,Previous,Review the card information before printing,Quantity,how many card items need to print,Download,Print";
//        $lang_path = base_path('resources/lang/en.json');
//        $english = explode(',', $english_test);
////        $translate = "";
//        $translate = "সুপ্রভাত,শুভ মধ্যাহ্ন,শুভ অপরাহ্ন,শুভ সন্ধ্যা,হ্যালো,জীবন বৃত্তান্ত সম্পাদনা,প্রস্থান,ড্যাশবোর্ড,তারিখ দ্বারা তৈরি কার্ড,ব্যবহারকারীর সংখ্যা,পরিচিতি,সংস্থাগুলি,মন্তব্য,অনুসন্ধান করুন,অনুসন্ধান করুন...,নাম,বিস্তারিত,জমা দিন,বাতিল করুন,এখানে বিস্তারিত নোট করুন..,মুছে ফেলা,পরিচিতি,আবর্জনা,ট্র্যাশ,স্পষ্ট,নতুন তৈরী করা,নাম,ইমেইল,শহর,ফোন,নামের প্রথম অংশ,নামের শেষাংশ,নামের শেষাংশ,শিরোনাম,সংগঠন,ইমেইল,ফোন,ঠিকানা,শহর,দেশ,পরিচিতি মুছুন,যোগাযোগ আপডেট করুন,সংস্থাগুলি,সংগঠন তৈরি করুন,প্রদেশ,রাষ্ট্র,দেশ,পোস্ট অফিসের নাম্বার,আপডেট সংস্থা,সংস্থা মুছুন,ব্যবহারকারীদের,নতুন তৈরী করা,পাসওয়ার্ড,ছবি,ব্যবহারকারী মুছুন,ব্যবহারকারী আপডেট করুন,অ্যাপ্লিকেশন নাম,সেটিংস,ব্যবহারকারীদের ম্যানেজ করুন,গ্লোবাল,ভাষা,নির্ধারিত ভাষা,লোগো,সংরক্ষণ,ব্রাউজ করুন,কোড,রিসেট,কার্ড তথ্য,নকশা চয়ন করুন,কার্ডের তথ্য পর্যালোচনা করুন,মুদ্রণ পূর্বরূপ,নিম্নলিখিত হিসাবে আপনার কার্ড তথ্য টাইপ করুন!,নাম,পেশা,ইমেইল,ফোন,ওয়েবসাইট,কোমপানির নাম,অবস্থান,CSV বা Excel ফাইল থেকে ডেটা আমদানি করতে চাইলে এটি পরীক্ষা করুন।,আপনি উদাহরণ ফর্ম্যাট করা csv ফাইল ডাউনলোড করতে পারেন যা সঠিকভাবে ডেটা আমদানি করতে সাহায্য করতে পারে।,পরবর্তী,পোর্ট্রেট কার্ড লেআউট,ল্যান্ডস্কেপ কার্ড লেআউট,আগে,প্রিন্ট করার আগে কার্ডের তথ্য পর্যালোচনা করুন,পরিমাণ,কত কার্ড আইটেম মুদ্রণ প্রয়োজন,ডাউনলোড করুন,ছাপা";
//        $explode = explode(',', $translate);
//        $data = [];
//        foreach ($english as $k=>$v){
//            $data[$v] = $explode[$k];
//        }
//        Storage::disk('lang_path')->put('bd.json', \json_encode($data, JSON_UNESCAPED_UNICODE));
//        dd('done!');


        $rows = Excel::toArray(new CsvImport, public_path('/files/import/import.csv'));
        dd($rows);
        return response()->json(["rows"=>$rows]);
    }
}
