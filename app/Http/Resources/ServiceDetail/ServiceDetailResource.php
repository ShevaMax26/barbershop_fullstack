<?php

namespace App\Http\Resources\ServiceDetail;

use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'service' => new ServiceResource($this->service),
            'duration' => $this->duration,
            'price' => $this->price,
        ];
    }
}
