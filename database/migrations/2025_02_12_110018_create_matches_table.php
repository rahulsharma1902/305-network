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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_id')->constrained('sports')->onDelete('cascade');
            $table->foreignId('team1_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team2_id')->constrained('teams')->onDelete('cascade');
            $table->date('match_date');
            $table->time('match_time');
            $table->integer('score_team1')->nullable();
            $table->integer('score_team2')->nullable();
            $table->enum('status', ['done', 'upcoming', 'live'])->default('upcoming');
            $table->enum('highlight_status', ['featured', 'non_featured'])->default('non_featured');
            $table->integer('team_update')->default(0);
            $table->integer('season_year');
            $table->foreignId('winning_team')->nullable()->constrained('teams')->onDelete('set null');
            $table->foreignId('manof_match_id')->nullable()->constrained('players')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
