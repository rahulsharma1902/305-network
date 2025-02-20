<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultimediaNews extends Model
{
    use HasFactory;
    protected $fillable = ['news_id', 'images'];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
