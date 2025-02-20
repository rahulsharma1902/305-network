<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $fillable = ['team_update', 'team1_id','team2_id','status'];
    public function sports(){
        return $this->hasOne(Sport::class,'id','sport_id');

    }
    public function team1(){
        return $this->hasOne(Team::class,'id','team1_id');
    }
    public function team2(){
        return $this->hasOne(Team::class,'id','team2_id');
    }
    public function manofthematch(){
        return $this->hasOne(Player::class,'id','manof_match_id');
    }
    public function winningteam(){
        return $this->hasOne(Team::class,'id','winning_team');
    }
    public function sportAttributes(){
        return $this->hasMany(SportAttribute::class,'sport_id','sport_id');
    }
    public function matchPlayerStat(){
        return $this->hasMany(MatchPlayerStat::class,'match_id','id');
    }
    
   
}
