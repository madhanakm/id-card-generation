<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert(['name' => 'App Name', 'slug' => 'app_name', 'type' => 'text', 'value' => 'Card Gen']);
        DB::table('settings')->insert(['name' => 'Default Language', 'slug' => 'default_language', 'type' => 'text', 'value' => 'en']);
        DB::table('settings')->insert(['name' => 'Footer Text', 'slug' => 'footer_text', 'type' => 'text', 'value' => 'CardGen © 2022 - Powered by W3BD']);
        DB::table('settings')->insert(['name' => 'Email Notifications', 'slug' => 'email_notifications', 'type' => 'json',
            'value' => json_encode([
                ['name' => 'Create ticket by new customer', 'slug' => 'create_ticket_new_customer', 'value' => false],
                ['name' => 'Create ticket from dashboard', 'slug' => 'create_ticket_dashboard', 'value' => false],
                ['name' => 'Notification for the first comment', 'slug' => 'first_comment', 'value' => false],
                ['name' => 'User got assigned for a task', 'slug' => 'assigned_ticket', 'value' => false],
                ['name' => 'Status or priority changes', 'slug' => 'status_priority', 'value' => false],
                ['name' => 'Create a new user', 'slug' => 'user_created', 'value' => false],
            ])
        ]);
    }
}
