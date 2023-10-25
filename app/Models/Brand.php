<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'code',
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
