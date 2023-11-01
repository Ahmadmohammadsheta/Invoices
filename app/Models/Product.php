<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'en_name',
        'code',
        'barecode',
        'total_units',
        'price',
        'selling_discount',
        'buying_discount',
        'tax',
        'description',
        'section_id',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that make section relationship
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    /**
     * The attributes that make section relationship
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * The attributes that make Created by relationship
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * The attributes that make Created by relationship
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    //------------------------------------------------------------------
    // Attributes Sectiuon related
    /**
    * Created by Attribute.
    *
    * @return Attribute
    */
    // protected function createdBy(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => auth()->id(),
    //         get: fn ($value) => User::find(1)->name,
    //     );
    // }
}
