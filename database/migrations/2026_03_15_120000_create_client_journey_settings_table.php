<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('client_journey_settings', function (Blueprint $table) {
            $table->id();

            // CTA 1: "Not seeing your exact case?"
            $table->string('cta1_title')->nullable();
            $table->text('cta1_description')->nullable();
            $table->string('cta1_button_text')->nullable();
            $table->string('cta1_button_link')->nullable();

            // CTA 2: "Just starting your research?"
            $table->string('cta2_title')->nullable();
            $table->text('cta2_description')->nullable();
            $table->string('cta2_button_text')->nullable();
            $table->string('cta2_button_link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_journey_settings');
    }
};
