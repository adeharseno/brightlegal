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
        // Section settings for Testimonials
        Schema::create('testimonials_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_section');
            $table->text('description_section');
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->timestamps();
        });

        // Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // title/category like "Visa service", "Property Agreements"
            $table->text('testimonial'); // the testimonial content
            $table->string('user_image')->nullable();
            $table->string('user_name');
            $table->string('user_title'); // job title/role
            $table->string('user_country');
            $table->string('background_color')->default('#B8C1F8'); // card background color
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
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('testimonials_settings');
    }
};
