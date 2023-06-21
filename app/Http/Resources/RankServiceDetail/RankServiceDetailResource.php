<?php

namespace App\Http\Resources\RankServiceDetail;

use App\Http\Resources\ServiceDetail\ServiceDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RankServiceDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'serviceDetails' => ServiceDetailResource::collection($this->serviceDetails),
        ];
    }
}
