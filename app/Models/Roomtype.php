<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;


    protected $fillable = ['room_types','adult_rate','child_rate','room_size','capacity','services','shortdesc1','shortdesc2','headimg','other1','other2','access'];
   
}
