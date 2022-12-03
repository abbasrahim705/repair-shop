<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'data' => [
                'id' =>(string) $this->id,
                'type' => 'Items',
                'attributes' => [
                    'name' => $this->name,
                    'description' => $this->description,
                    'amount'=> $this->amount,
                    'image' => $this->image,
                    'serial_no' => $this->serial_no,
                    'category' => $this->category,
                    'created_by' => $this->user,
                ],
            ]
        ];
    }
}
