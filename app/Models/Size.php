<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'created_by',
        'updated_by'
        ];

    protected $appends = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $visible = [
    ];
}
