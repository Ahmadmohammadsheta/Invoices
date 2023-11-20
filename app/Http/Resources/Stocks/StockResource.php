<?php

namespace App\Http\Resources\Stocks;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
            'sub_product_id' => $this->sub_product_id,
            'quantity' => $this->quantity,
            'available' => $this->available,
            'approved' => $this->approved,
            'price' => $this->price,
            'price' => $this->price,
            'buying_price' => $this->buying_price,
            'buying_discount' => $this->buying_discount,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
            'over_price' => $this->over_price,
            'expire_date' => $this->expire_date,
            'code' => $this->code,
            'starting_stock' => $this->starting_stock,
            'discount' => $this->discount,
            'created_by' => $this->createdBy->name,
            'updated_by' => $this->updatedBy->name,
        ];
    }
}
