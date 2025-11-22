<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'image'     => $this->image
                ? asset('public/uploads/category/' . $this->image) // adjust path
                : null,
            'parent_id' => $this->parent_category_id,
        ];
    }
}
