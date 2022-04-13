<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'address' => AddressResource::make($this->addressable),
            'document' => DocumentResource::make($this->documentation),
            'deleted_at' => $this->deleted_at,
            'create_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
