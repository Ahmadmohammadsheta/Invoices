<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable  = [
        'sub_product_id',
        'quantity',
        'available',
        'approved',
        'price',
        'buying_price',
        'color_id',
        'size_id',
        'over_price',
        'expire_date',
        'code',
        'starting_stock',
        'discount',
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

    public function subProduct()
    {
        return $this->belongsTo(SubProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function trader()
    {
        return $this->hasOneThrough(
            Trader::class,
            Unit::class,
            'trader_id',
            'id',
            'unit_id',
            'id',
        );
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
