<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('email_templates')->truncate();

        EmailTemplate::factory()->create([
            'name' => 'Custom Mail',
            'slug' => 'custom_mail',
            'details' => 'It will use to send any custom email.',
            'language' => 'en',
            'html' => File::get(public_path('html/email_templates/custom_mail.html'))
        ]);

        EmailTemplate::factory()->create([
            'name' => 'User created',
            'slug' => 'user_created',
            'details' => 'When a new user created.',
            'language' => 'en',
            'html' => File::get(public_path('html/email_templates/user_created.html'))
        ]);
        //
    }
}
