<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['attribute_name','sport_id'];
    public function matchPlayerStats()
{
    return $this->hasMany(MatchPlayerStat::class, 'attribute_id', 'id');
}

}
