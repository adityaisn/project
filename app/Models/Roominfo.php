<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roominfo extends Model
{
    use HasFactory;
    protected $fillable = ['room_name','telephone_no','room_size','room_type','addional_details','status','access'];
}