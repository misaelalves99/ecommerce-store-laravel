<?php
// app/Models/Brand.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
    ];

    // Habilita timestamps automáticos
    public $timestamps = true;

    // Converte automaticamente created_at, updated_at e is_active
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
