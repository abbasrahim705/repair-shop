<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
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
            'clients' => $this->resource['clients'],
            'total_technicians' => $this->resource['technicians'],
            'total_orders' => $this->resource['orders']->count(),
            'client_orders' => $this->resource['client_order']->count(),
            'client_items' => $this->resource['client_item']->count(),
            'total_services' => $this->resource['services']->count(),
            'total_earnings' => $this->resource['earnings'],
            'services' => $this->resource['services'],
            'setting' => [
                'id' => $this->resource['setting']->id,
                'type' => 'setting',
                'attributes' => [
                    'shop_name' => $this->resource['setting']->shop_name,
                    'owner_name' => $this->resource['setting']->owner_name,
                    'shop_slogan' => $this->resource['setting']->shop_slogan,
                    'logo' => $this->resource['setting']->logo,
                    'address' => $this->resource['setting']->address,
                    'map_address' => $this->resource['setting']->map_address,
                    'email' => $this->resource['setting']->email,
                    'contact' => [
                        'eamil' => $this->resource['setting']->email,
                        'web_address' => $this->resource['setting']->web_address,
                        'facebook' => $this->resource['setting']->facebook,
                        'whatsapp' => $this->resource['setting']->whatsapp,
                        'instagram' => $this->resource['setting']->instagram,
                        'youtube' => $this->resource['setting']->youtube,
                        'tiktok' => $this->resource['setting']->tiktok,
                        'linkedin' => $this->resource['setting']->linkedin,
                        'edited_by' => [
                            'id' => $this->resource['setting']->edited_by,
                            'type' => 'user',
                            'attributes' => [
                                'name' => $this->resource['setting']->admin->name,
                                'email' => $this->resource['setting']->admin->email,

                            ],
                        ],
                    ],
                ],
            ],

        ];
    }
}
