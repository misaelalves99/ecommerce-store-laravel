<?php
// app/Models/Brand.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'is_active',
    ];

    public $timestamps = false;
}
