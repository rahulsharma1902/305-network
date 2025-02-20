<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FooterHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('footer_pages')->truncate();
        DB::table('header_pages')->truncate();

        Schema::enableForeignKeyConstraints();

        // Seed footer_pages
        DB::table('footer_pages')->insert([
            'address' => '1425 Broadway Suite 22689 Seattle, WA 98112',
            'phone' => '+1 (123) 456-7890',
            'email' => 'info@305network.com',
            'description_title' => '© 2025 305 Network',
            'description' => '305 Network and the 305 Network design are registered trademarks of the National Football League. The team names, logos and uniform designs are registered trademarks of the teams indicated. All other 305 Network-related trademarks are trademarks of the National Football League. 305 Network © NFL Productions LLC.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed header_pages
        DB::table('header_pages')->insert([
            'breaking_text' => 'Breaking',
            'news_label' => 'News',
            'news_ticker_text' => "Lorem Ipsum has been the industry's standard",
            'news_ticker_link' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
