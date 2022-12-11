<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // hiding some fields for api call
        return [
            'id' => $this->id,
            'name' => $this->variant_name,
            'variant_group' => $this->variantgroup()->variant_group_name
        ];
    }
}
