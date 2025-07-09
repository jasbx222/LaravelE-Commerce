<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'type' => $this->type ?? 'customer',
            'is_active' => $this->is_active ?? true,

            'avatar' => $this->avatar,
            'email' => $this->email,

            'carts' =>  CartResource::collection($this->carts),
         

        ];
    }
}
