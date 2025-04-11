<?php

use Database\Seeders\CardFieldSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('card_fields')) { return; }
        Schema::create('card_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name', '250')->nullable();
            $table->string('slug', '250')->nullable();
            $table->string('value', '250')->nullable();
            $table->tinyInteger('is_active')->default(1);
        });
        $seeder = new CardFieldSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_fields');
    }
};
