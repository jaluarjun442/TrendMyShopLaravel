<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'description'    => $this->description,
            'sku'            => $this->sku,
            'image'          => $this->image
                ? asset('public/uploads/product/' . $this->image) // adjust path as per your project
                : null,
            'price'          => $this->price,
            'discount_price' => $this->discount_price,
            'category_id'    => $this->category_id,
            'category_name'  => optional($this->category)->name,
            'is_trend'       => (bool) $this->is_trend,
            'aff_link'       => $this->aff_link,   // this will be used for "Buy Now" – open in browser
        ];
    }
}
