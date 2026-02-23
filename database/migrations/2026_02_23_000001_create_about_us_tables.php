<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Settings for "About Us" page sections
        Schema::create('about_us_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_image_left')->nullable();
            $table->string('hero_image_center')->nullable();
            $table->string('hero_image_right')->nullable();

            // Mission Section
            $table->string('mission_label')->nullable();
            $table->string('mission_title_line1')->nullable();
            $table->string('mission_title_line2')->nullable();
            $table->text('mission_body_left')->nullable();
            $table->text('mission_body_right')->nullable();
            $table->string('mission_image_1')->nullable();
            $table->string('mission_image_2')->nullable();
            $table->string('mission_image_3')->nullable();

            // Team Section
            $table->string('team_label')->nullable();
            $table->string('team_title')->nullable();
            $table->string('team_button_text')->nullable();
            $table->string('team_button_link')->nullable();

            // Clients Section
            $table->text('clients_text')->nullable();

            $table->timestamps();
        });

        // Team members for "About Us" page
        Schema::create('about_us_team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('background_color')->default('#D4A78A');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('about_us_team_members');
        Schema::dropIfExists('about_us_settings');
    }
};
