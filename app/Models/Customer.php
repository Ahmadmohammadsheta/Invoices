<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'img',
        'age',
        'national_id',
        'national_id_image',
        'phone1',
        'phone2',
        'phone3',
        'email',
        'approved',
        'type',
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
