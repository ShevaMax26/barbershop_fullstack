<?php

namespace App\Http\Resources\Cabinet;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPersonalInfoResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'sex' => $this->getSexNameAttribute(),
            'birth' => $this->getBirthDateAttribute(),
        ];
    }
}
