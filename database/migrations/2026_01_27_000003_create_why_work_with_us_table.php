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
        // Section settings for "Why Work With Us"
        Schema::create('why_work_with_us_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_section');
            $table->string('subtitle_section')->nullable();
            $table->text('description_section');
            $table->timestamps();
        });

        // Cards for "Why Work With Us"
        Schema::create('why_work_with_us_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_work_with_us_cards');
        Schema::dropIfExists('why_work_with_us_settings');
    }
};
