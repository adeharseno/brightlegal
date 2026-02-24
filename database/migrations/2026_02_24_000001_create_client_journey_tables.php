<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('client_journey_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('client_journey_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_journey_category_id')->constrained()->cascadeOnDelete();
            $table->integer('number')->default(1);
            $table->string('client_type')->nullable(); // e.g. "Individual"
            $table->string('topic')->nullable();        // e.g. "Relocation"
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('challenge')->nullable();
            $table->text('how_we_helped')->nullable();
            $table->text('outcome')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_journey_items');
        Schema::dropIfExists('client_journey_categories');
    }
};
