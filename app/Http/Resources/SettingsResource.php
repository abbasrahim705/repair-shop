<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
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
            'type' => 'Setting',
            'attributes' => [
                'shop_name' => $this->shop_name,
                'shop_slogan' => $this->shop_slogan,
                'logo' => $this->logo,
                'owner_name' => $this->owner_name,
                'address' => $this->address,
                'map_address' => $this->map_address,
                'email' => $this->email,
                'contact_no' => $this->contact_no,
                'socail_links' => [
                    'facebook' => $this->facebook,
                    'whatsapp' => $this->whatsapp,
                    'youtube' => $this->youtube,
                    'linkedin' => $this->linkedin,
                    'tiktok' => $this->tiktok,
                    'instagram' => $this->instagram,
                    'website' => $this->web_address
                ],
                'created_by' => $this->admin,
            ],
        ];
    }
}
