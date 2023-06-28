<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'branch_id' => $this->branch_id,
            'barber_id' => $this->barber_id,
//            'start_time' => $this->start_time,
            'scheduled_date' => $this->scheduled_date,
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'services' => $this->services->map(function ($service) {
                return [
                    'id' => $service->id,
                    'price' => $service->price,
                    'duration' => $service->duration,
                ];
            }),
        ];
    }
}
