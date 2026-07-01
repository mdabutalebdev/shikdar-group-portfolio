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
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->string('instagram_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->boolean('facebook_active')->default(1);
            $table->boolean('linkedin_active')->default(1);
            $table->boolean('twitter_active')->default(1);
            $table->boolean('instagram_active')->default(1);
            $table->boolean('whatsapp_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn([
                'instagram_url', 'whatsapp_url',
                'facebook_active', 'linkedin_active', 'twitter_active', 'instagram_active', 'whatsapp_active'
            ]);
        });
    }
};
