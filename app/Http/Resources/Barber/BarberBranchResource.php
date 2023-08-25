<?php

namespace App\Http\Resources\Barber;

use Illuminate\Http\Resources\Json\JsonResource;

class BarberBranchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'rank_id' => optional($this->rank)->id,
            'rank_title' => optional($this->rank)->title,
        ];
    }
}
