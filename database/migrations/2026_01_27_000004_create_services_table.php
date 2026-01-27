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
        // Section settings for Services
        Schema::create('services_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_section');
            $table->text('description_section');
            $table->timestamps();
        });

        // Service categories
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('service_categories')->onDelete('set null');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->text('key_benefits')->nullable(); // WYSIWYG content
            $table->text('required_documents')->nullable(); // WYSIWYG content
            $table->text('important_notes')->nullable(); // WYSIWYG content
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
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_categories');
        Schema::dropIfExists('services_settings');
    }
};
