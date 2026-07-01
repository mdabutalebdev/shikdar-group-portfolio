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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title_1')->nullable();
            $table->string('hero_title_2')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_btn1_text')->nullable();
            $table->string('hero_btn1_url')->nullable();
            $table->string('hero_btn2_text')->nullable();
            $table->string('hero_btn2_url')->nullable();
            $table->string('hero_bg_image')->nullable();
            
            $table->string('about_subtitle')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_desc_1')->nullable();
            $table->text('about_desc_2')->nullable();
            $table->string('about_btn_text')->nullable();
            $table->string('about_btn_url')->nullable();
            $table->string('about_years_experience')->nullable();

            $table->string('metric_1_number')->nullable();
            $table->string('metric_1_text')->nullable();
            $table->string('metric_2_number')->nullable();
            $table->string('metric_2_text')->nullable();
            $table->string('metric_3_number')->nullable();
            $table->string('metric_3_text')->nullable();
            $table->string('metric_4_number')->nullable();
            $table->string('metric_4_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
