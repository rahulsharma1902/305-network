<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $fillable = ['news_ticker_title', 'advertisement_banner_image','advertisement_banner_url'];

    
    public function bannerSliders(){
        return $this->hasMany(HomePageMedia::class,'home_page_id','id')->where('type', 'banner_slider');
    }
    public function matchHighlights(){
        return $this->hasMany(HomePageMedia::class,'home_page_id','id')->where('type', 'match_highlight_video');
    }
    public function newsTickerContents(){
        return $this->hasMany(HomePageMedia::class,'home_page_id','id')->where('type', 'news_ticker_content');
    }
    public function matchNotifications(){
        return $this->hasMany(HomePageMedia::class,'home_page_id','id')->where('type', 'match_notification');
    }
}
