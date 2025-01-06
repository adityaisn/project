<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roombooking extends Model
{
    use HasFactory;
    protected $fillable = ['cust_id','check_in_date','check_out_date','no_of_adult','no_of_child','purpose_of_stay','id_proof','visitor_proof','room_id','amount','total','paid','remaining','access','status'];
}