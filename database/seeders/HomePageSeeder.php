<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete old data before inserting new records
        DB::table('home_pages')->truncate();
        DB::table('home_page_media')->truncate();

        // Seed home_pages table
        $homePageId = DB::table('home_pages')->insertGetId([
            'news_ticker_title' => 'NEWS TICKER+++',
            'advertisement_banner_image' => 'Pages/Home/advertisements/1740045987.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed home_page_media table
        $mediaData = [
            [
                'home_page_id' => $homePageId,
                'type' => 'news_ticker_content',
                'title' => 'Gilchrist Connell promotes financial lines specialist to principal',
                'image' => null,
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'news_ticker_content',
                'title' => 'Gilchrist Connell promotes fin',
                'image' => null,
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'news_ticker_content',
                'title' => 'Gilchrist Connell promotes financial lines specialist to principal',
                'image' => null,
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'news_ticker_content',
                'title' => 'Gilchrist Connell promotes fin',
                'image' => null,
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'news_ticker_content',
                'title' => 'Gilchrist Connell promotes financial lines specialist to principal',
                'image' => null,
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'news_ticker_content',
                'title' => 'Gilchrist Connell promotes fin',
                'image' => null,
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'banner_slider',
                'title' => null,
                'image' => 'Pages/Home/banner_sliders/1739972436.png',
                'video_url' => null,
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'match_highlight_video',
                'title' => null,
                'image' => 'img/img_glly1.png',
                'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'match_highlight_video',
                'title' => null,
                'image' => 'img/img_glly2.png',
                'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
            ],
            [
                'home_page_id' => $homePageId,
                'type' => 'match_notification',
                'title' => null,
                'image' => 'Pages/Home/match_notifications/1740031278.png',
                'video_url' => null,
            ],
        ];

        DB::table('home_page_media')->insert($mediaData);
    }
}
?>