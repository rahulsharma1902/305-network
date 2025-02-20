<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchPlayerStat extends Model
{
    use HasFactory;
    protected $fillable = ['match_id', 'attribute_id','player_id','attribute_value'];

    public function attribute(){
        return $this->hasOne(SportAttribute::class,'id','attribute_id');
    }
    public function matchdata(){
        return $this->hasOne(Matches::class,'id','match_id');
    }
    public function player(){
        return $this->hasOne(Player::class,'id','player_id');
    }
}
