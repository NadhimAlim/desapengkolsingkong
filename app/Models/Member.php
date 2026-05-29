<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'business_name', 'phone_number', 'is_active'];
}