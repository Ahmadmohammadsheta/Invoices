<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoicesAttachment extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'invoices';
    protected $appends = ['path'];
    protected $fillable  = [
        'file_name',
        'invoice_number',
        'created_by',
        'invoice_id '
        ];

    /**
     * The attributes that make invoicesAttachment relationship
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
    protected function createdBy(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => auth()->user()->name,
            get: fn ($value) => $value,
        );
    }



    // public function getPathAttribute()
    // {
    //     return asset('storage/images/invoices') . '/' . $this->file_name;
    // }

     /**
     * Double Attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function path(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('storage/images/invoices') . '/' . $this->file_name,
        );
    }

     /**
     * Double Attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fileName(): Attribute
    {
        return Attribute::make(
            // get: fn ($value) => asset('storage/images/invoices') . '/' . $value,
            // set: fn ($value) => $this->setImage($value, 'invoices', 450, 450),
        );
    }
}
