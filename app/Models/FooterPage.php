<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterPage extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'email','phone','description_title','description'];

}
