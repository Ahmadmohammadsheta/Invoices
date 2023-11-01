<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'img',
        'age',
        'national_id',
        'email',
        'phone1',
        'type',
        'phone2',
        'phone3',
        'national_id_image',
        'approved',
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


    /**
    * Created by Attribute.
    *
    * @return Attribute
    */
    protected function createdBy(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => User::find($value)->name,
            set: fn ($value) => auth()->id(),
        );
    }

    /**
    * Created by Attribute.
    *
    * @return Attribute
    */
    // protected function age(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Carbon::parse($value),
    //         set: fn ($value) => auth()->id(),
    //     );
    // }
}
