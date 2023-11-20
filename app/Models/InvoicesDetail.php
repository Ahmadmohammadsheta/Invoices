<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoicesDetail extends Model
{
    use HasFactory;

    protected $fillable  = [
        'invoice_id ',
        'invoice_number',
        'product',
        'section',
        'status',
        'value_status',
        'payment_date',
        'note',
        'created_by',
        ];

    /**
     * The attributes that make invoiceDetail relationship
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

    //------------------------------------------------------------------
    // Attributes Sectiuon related
    /**
    * Created by Attribute.
    *
    * @return Attribute
    */
    // protected function user(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn (string $value) => $value ?: auth()->user()->name,
    //         get: fn ($value) => $value,
    //     );
    // }

    /**
     * Interact with the user's first name.
     */
    protected function user(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn (string $value) => auth()->user()->name,
        );
    }
}
