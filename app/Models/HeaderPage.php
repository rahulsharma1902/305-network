<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderPage extends Model
{
    use HasFactory;
    protected $fillable = ['breaking_text', 'news_label','news_ticker_text','news_ticker_link'];

}
