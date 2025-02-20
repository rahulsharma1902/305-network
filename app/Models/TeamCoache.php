<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCoache extends Model
{
    use HasFactory;
    protected $fillable = ['team_id', 'coach_id','position_id'];
    public function coach(){
        return $this->hasOne(Coache::class,'id','coach_id');
    }

}
