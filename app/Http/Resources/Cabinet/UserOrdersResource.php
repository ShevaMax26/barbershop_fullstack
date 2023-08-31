<?php

namespace App\Http\Resources\Cabinet;

use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $totalAmount = $this->services->sum(function ($service) {
            return $service->pivot->price;
        });

        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'date' => $this->date,
            'start' => $this->start,
            'end' => $this->end,
            'status' => $this->status,
            'services' => ServiceResource::collection($this->services),
            'service_pivot_data' => $this->whenLoaded('services', function () {
                return $this->services->map(function ($service) {
                    return [
                        'service_id' => $service->id,
                        'price' => $service->pivot->price,
                        'duration' => $service->pivot->duration,
                    ];
                });
            }),
            'total_amount' => $totalAmount,
        ];
    }
}
