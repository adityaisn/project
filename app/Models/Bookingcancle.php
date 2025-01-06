<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookingcancle extends Model
{
    use HasFactory;
    protected $fillable = ['custname','custmobile','email','checkindate','checkoutdate','reason','other1','other2'];
}