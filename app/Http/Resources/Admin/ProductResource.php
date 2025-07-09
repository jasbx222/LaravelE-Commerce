<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'is_active' => $this->is_active,
            'discount_percent' => $this->discount_percent,
            'category_id' => $this->category_id,
            'seller_id' => $this->seller_id,
                 'created_at'  => $this->created_at->toDateTimeString(),
            'updated_at'  => $this->updated_at->toDateTimeString(),
          
            'links' => [
                'self' => route('products.show', $this->id),
                'update' => route('products.update', $this->id),
                'delete' => route('products.destroy', $this->id),
            ],
        ];
    }
}
