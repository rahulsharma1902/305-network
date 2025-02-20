<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    use HasFactory;
    protected $fillable = ['team_id', 'season_year','player_id','status'];
    public function player(){
        return $this->hasOne(Player::class,'id','player_id');
    }
    public function position(){
        return $this->hasOne(Position::class,'id','position_id');
    }
    public function matchPlayerStats()
    {
        return $this->hasMany(MatchPlayerStat::class, 'player_id', 'id');
    }
    public function team(){
        return $this->hasOne(Team::class,'id','player_id');
    }
    
}
