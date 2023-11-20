<?php

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'img' => $this->img ? $this->path : false,
            'age' => $this->age,
            'national_id' => $this->national_id,
            'email' => $this->email,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'phone3' => $this->phone3,
            'buying_discount' => $this->buying_discount,
            'national_id_image' => $this->national_id_image,
            'approved' => $this->approved,
            'section_id' => $this->section_id,
            'created_by' => $this->createdBy->name,
            'updated_by' => $this->updatedBy->name,
        ];
    }
}
