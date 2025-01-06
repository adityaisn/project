<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookroomweb extends Model
{
    use HasFactory;
    protected $fillable = ['name','mobile','email','address','state','pincode','room_id','room_rate','no_of_persons','checkindate','checkoutdate','no_of_day','discount','discountamount','totalamount','gst','gstamount','taxable','status','no_of_rooms','extra_person','person_qty','person_rate'];
}