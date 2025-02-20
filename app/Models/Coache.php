<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coache extends Model
{
    use HasFactory;
    public function position(){
        return $this->hasOne(Position::class,'id','position_id');
    }
}
