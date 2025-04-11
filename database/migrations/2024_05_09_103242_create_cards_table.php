<?php

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
        if (Schema::hasTable('cards')) { return; }
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('type', '50')->default('portrait');
            $table->integer('user_id')->nullable();
            $table->string('title', '150')->nullable();
            $table->string('background', '150')->nullable();
            $table->string('color', '100')->nullable();
            $table->text('html')->nullable();
            $table->text('css')->nullable();
            $table->tinyInteger('border_radius')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
