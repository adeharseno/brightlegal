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
        // Section settings for FAQs
        Schema::create('faqs_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_section');
            $table->text('description_section');
            $table->timestamps();
        });

        // FAQs
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // question
            $table->text('description'); // answer (WYSIWYG)
            $table->string('page')->default('home'); // which page: home, our-services
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
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('faqs_settings');
    }
};
