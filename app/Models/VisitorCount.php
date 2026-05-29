<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorCount extends Model
{
    protected $fillable = ['page_name', 'visit_date', 'views_count'];
}