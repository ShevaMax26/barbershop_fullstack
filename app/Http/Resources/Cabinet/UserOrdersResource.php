<?php

namespace App\Http\Resources\Cabinet;

use App\Http\Resources\Barber\BarberBranchResource;
use App\Http\Resources\Service\ServiceResource;
use App\Models\ServiceDetail;
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
        return [
            'id' => $this->id,
            'employee' => new BarberBranchResource($this->employee),
            'date' => $this->formattedStartDate,
            'start' => $this->formattedStartTime,
            'end' => $this->formattedEndTime,
            'status' => $this->status,
            'services' => ServiceResource::collection($this->services),
            'total_amount' => $this->totalAmount,
            'total_duration' => $this->formattedTotalDuration,
        ];
    }
}
