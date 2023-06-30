<?php

namespace App\Http\Resources\Barber;

use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BarberServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'service' => new ServiceResource($this->whenLoaded('service')),
            'duration' => $this->duration,
            'price' => $this->price,
        ];
    }
}
