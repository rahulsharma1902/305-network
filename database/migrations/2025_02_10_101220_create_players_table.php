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
        // Schema::create('players', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('first_name');
        //     $table->string('last_name');
        //     $table->string('height')->nullable();
        //     $table->string('weight')->nullable();
        //     $table->date('dob')->nullable();
        //     $table->integer('experience')->nullable();
        //     $table->string('location')->nullable();
        //     $table->string('jersey_no')->nullable();
        //     $table->string('image')->nullable();
        //     $table->string('twitter')->nullable();
        //     $table->string('instagram')->nullable();
        //     $table->string('facebook')->nullable();
        //     $table->longtext('bio')->nullable();
        //     $table->string('email')->unique();
        //     $table->string('phone')->nullable();
        //     $table->string('high_school')->nullable();
        //     $table->string('graduation_year')->nullable();
        //     $table->string('student_id')->nullable();
        //     $table->string('banner_image_video')->nullable();
        //     $table->longtext('athletic_info')->nullable();
        //     $table->longtext('season_stat')->nullable();
        //     $table->longtext('academic_info')->nullable();
        //     $table->longtext('highlight_media')->nullable();
        //     $table->longtext('achievements_award')->nullable();
        //     $table->longtext('recruiting_info')->nullable();
        //     $table->timestamps();
        // });
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->unique();
            $table->string('high_school')->nullable();
            $table->string('class')->nullable();
            $table->year('graduation_year')->nullable();
            $table->date('dob')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->integer('jersey_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image_video')->nullable();

            // Athletic Stats
            $table->longtext('athletic_info')->nullable();
            $table->decimal('yard_dash_time', 5, 2)->nullable();
            $table->decimal('vertical_jump', 5, 2)->nullable();
            $table->decimal('shuttle_run_time', 5, 2)->nullable();
            $table->integer('squat_max')->nullable();
            $table->integer('deadlift_max')->nullable();

            // Performance Stats (Stored as JSON for flexibility)
            $table->longtext('season_stat')->nullable();
            $table->integer('games_played')->default(0)->nullable();
            // $table->json('total_yards')->nullable(); // { "passing": 1000, "rushing": 500, "receiving": 300 }
            $table->string('total_yards_passing')->nullable();
            $table->string('total_yards_rushing')->nullable();
            $table->string('total_yards_receiving')->nullable();

            $table->integer('touchdowns')->default(0);
            $table->integer('tackles')->default(0);
            $table->integer('interceptions')->default(0);
            $table->string('kicking_stats')->nullable(); // { "fg_made": 10, "longest_fg": 55 }

            // Academic Info
            $table->longtext('academic_info')->nullable();

            $table->string('gpa')->nullable();
            $table->string('sat_act_scores')->nullable();
            $table->longtext('academic_honors')->nullable();

            // Media Links (Stored as JSON arrays)
            $table->longtext('highlight_info')->nullable();

            $table->json('highlight_videos')->nullable();
            $table->string('game_footage_link')->nullable();
            $table->string('photo_gallery_link')->nullable();

            // Awards & Camps
            $table->longtext('award_info')->nullable();

            $table->string('team_mvp_award')->nullable();
            $table->string('all_state_honors')->nullable();
            $table->string('athletic_camps_attended')->nullable(); 

            // Recruiting
            $table->longtext('recruting_info')->nullable();

            $table->string('commitment_status')->nullable();
            $table->string('offers_received')->nullable(); 
            $table->string('preferred_colleges')->nullable(); 

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
