<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    public function positions(){
        return $this->hasMany(Position::class,'sport_id','id');
    }
    public function attributes(){
        return $this->hasMany(SportAttribute::class,'sport_id','id');
    }
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
