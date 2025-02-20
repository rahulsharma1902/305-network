<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['attribute_name', 'attribute_value','player_id'];

}
