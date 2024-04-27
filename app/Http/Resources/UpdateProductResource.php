<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [ 
           
            'title'=> $this->title, 
            'description'=> $this->description,
            'size'=> $this->size, 
            'color'=> $this->color, 
            'price'=> $this->price,
            
        ]; 
    }
}
