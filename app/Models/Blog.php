<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
      protected $fillable = ['title','date','photo','short_descreption','long_descreption1','long_descreption2','long_descreption3'];
}
