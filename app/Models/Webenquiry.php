<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webenquiry extends Model
{
    use HasFactory;
    protected $fillable = ['custname','custmobile','address','pincode','checkindate','checkoutdate','no_of_persons','no_of_room','note','status','other1','other2'];
}