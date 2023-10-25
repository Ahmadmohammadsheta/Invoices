<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    use HasFactory;

    protected $fillable  = [
        'product_id',
        'available',
        'approved',
        'price',
        'buying_price',
        'unit_id',
        'code',
        'over_price',
        'expire_date',
        'min_quantity',
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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
