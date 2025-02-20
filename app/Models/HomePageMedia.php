<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageMedia extends Model
{
    use HasFactory;
    protected $fillable = ['home_page_id', 'type','image','video_url','title'];

}
