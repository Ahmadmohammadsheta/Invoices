<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\Colors\ColorResource;
use App\Http\Resources\Sizes\SizeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'en_name' => $this->en_name,
            'code' => $this->code,
            'barecode' => $this->barecode,
            'price' => $this->price,
            'total_units' => $this->total_units,
            'selling_discount' => $this->selling_discount,
            'buying_discount' => $this->buying_discount,
            'tax' => $this->tax,
            'description' => $this->description,
            'section_id' => $this->section_id,
            'created_by' => $this->createdBy->name,
            // 'updated_by' => $this->updatedBy->name,
            'img' => $this->img ? $this->path : false,
        ];
    }
}
