<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            "id" => $this->id,
            "public_place" => $this->public_place,
            "number" => $this->number,
            "complement" => $this->complement,
            "zipcode" => $this->zipcode,
            "neighborhood" => $this->neighborhood,
            "city" => CityResource::make($this->city),
        ];
    }
}
