<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public function sport(){
        return $this->hasOne(Sport::class,'id','sport_id');
    }
    public function coaches(){
        return $this->hasMany(TeamCoache::class,'team_id','id');
    }
   
    public function players(){
        return $this->hasMany(TeamPlayer::class,'team_id','id')->where('status','playing');
    }
    public function matchPlayerStats($matchId)
    {
        return $this->hasMany(MatchPlayerStat::class, 'player_id', 'id')
                    ->where('match_id', $matchId);
    }
}
