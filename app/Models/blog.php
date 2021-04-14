<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    
    protected  $table    = "blog";

    protected  $fillable = ['name','password','email'];

    protected  $hidden   = ['created_at','updated_at'];












}
