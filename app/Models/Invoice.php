<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use  SoftDeletes;

    protected $fillable  = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'invoice_type',
        'product_id',
        'amount_collection',
        'amount_commission',
        'discount',
        'value_vat',
        'rate_vat',
        'total',
        'status',
        'value_status',
        'note',
        'payment_Date',
        'created_by',
        ];

    /**
     * The attributes that make section relationship
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    /**
     * The attributes that make product relationship
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * The attributes that make invoiceDetail relationship
     */
    public function invoicesDetail()
    {
        return $this->hasOne(InvoicesDetail::class, 'invoice_id', 'id');
    }

    /**
     * The attributes that make invoicesAttachment relationship
     */
    public function invoicesAttachment()
    {
        return $this->hasOne(InvoicesAttachment::class, 'invoice_id', 'id');
    }

    /**
    * Created by Attribute.
    *
    * @return Attribute
    */
    protected function status(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? $value : "اجل",
            get: fn ($value) => $value ? $value : "اجل",
        );
    }

    /**
    * Created by Attribute.
    *
    * @return Attribute
    */
    protected function ValueStatus(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? $value : 1,
            get: fn ($value) => $value ? $value : 1,
        );
    }

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
}
