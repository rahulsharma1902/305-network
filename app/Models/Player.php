<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public function playerAttributes(){
        return $this->hasMany(PlayerAttribute::class,'player_id','id');
    }
    public function teamPlayer(){
        return $this->hasOne(TeamPlayer::class,'player_id','id');
    }
    
     
}
