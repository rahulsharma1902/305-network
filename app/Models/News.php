<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author_name', 'date', 'tag_player'];

    protected $casts = [
        'tag_player' => 'array', // Convert JSON data to array
    ];

    public function multimediaNews()
    {
        return $this->hasMany(MultimediaNews::class, 'news_id');
    }
    public function images()
    {
        return $this->hasMany(MultimediaNews::class, 'news_id');
    }
}
