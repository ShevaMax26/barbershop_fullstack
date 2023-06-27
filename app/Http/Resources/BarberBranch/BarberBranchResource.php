<?php

namespace App\Http\Resources\BarberBranch;

use Illuminate\Http\Resources\Json\JsonResource;

class BarberBranchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
        ];
    }
}
