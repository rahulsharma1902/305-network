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
        Schema::create('home_page_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_page_id');
            $table->string('type')->nullable(); // Type: 'match_notification', 'match_highlight', or 'banner_slider' , ' news_ticker_content
            $table->string('image')->nullable(); // Image URL (for notifications and sliders)
            $table->string('video_url')->nullable(); // Video URL (for match highlights)
            $table->string('title')->nullable(); // For news_ticker_content 
            $table->timestamps();          
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_media');
    }
};
