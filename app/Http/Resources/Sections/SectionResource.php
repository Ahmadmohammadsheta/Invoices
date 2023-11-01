<?php

namespace App\Http\Resources\Sections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\UserResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $units         = $this->whenLoaded('units');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_by' => new UserResource($this->createdBy),
            'updated_by' => new UserResource($this->updatedBy),
            // 'units'      => UnitResource::collection($units),
        ];
    }
}
