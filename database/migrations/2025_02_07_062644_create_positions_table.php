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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('short_code')->nullable(); 
            $table->unsignedBigInteger('sport_id')->nullable(); 
            $table->enum('category', ['player', 'coach']); 
            $table->text('description')->nullable(); 
            $table->timestamps(); 

            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
