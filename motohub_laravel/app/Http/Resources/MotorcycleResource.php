<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class MotorcycleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'model' => $this->getModel(),
            'category' => $this->getCategory(),
            'image' => $this->getImage(),
            'description' => $this->getDescription(),
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
            'is_active' => $this->getIsActive(),
            'brand_id' => $this->getBrandId()
        ];
    }
}