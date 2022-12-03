<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TechniciansResource extends JsonResource
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
            'id' =>(string) $this->id,
            'type' => 'Technicain',
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address,
                'phone' => $this->phone,
                'status' => $this->status,
                'image' => $this->image,
                'created_by' => $this->user,
            ],
        ];
    }
}
