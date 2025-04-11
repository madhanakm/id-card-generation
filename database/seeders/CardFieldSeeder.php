<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CardFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('card_fields')->truncate();
        Schema::enableForeignKeyConstraints();
        $custom_fields = [
            ['name' => 'Name', 'slug' => 'name', 'value' => 'Your Name', 'is_active' => 1],
            ['name' => 'Profession', 'slug' => 'profession', 'value' => 'Web Designer', 'is_active' => 1],
            ['name' => 'Email Address', 'slug' => 'email', 'value' => 'info@example.com', 'is_active' => 1],
            ['name' => 'Phone', 'slug' => 'phone', 'value' => '0123456789', 'is_active' => 1],
            ['name' => 'Website', 'slug' => 'website', 'value' => 'www.example.com', 'is_active' => 1],
            ['name' => 'Company', 'slug' => 'company', 'value' => 'CardGen', 'is_active' => 1],
            ['name' => 'Location', 'slug' => 'location', 'value' => 'NY, United States', 'is_active' => 1],
        ];
        DB::table('card_fields')->insert($custom_fields);
    }
}
