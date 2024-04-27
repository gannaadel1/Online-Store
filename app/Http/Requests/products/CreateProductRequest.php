<?php

namespace App\Http\Requests\products;

use App\Http\Requests\BaseRequestFormApi;

class CreateProductRequest extends BaseRequestFormApi
{
    public function rules(): array
    {
        return[
          
            'title'=>'required|min:5|max:50',
            'description'=>'required|min:6|max:50',
            'size'=>'required|numeric|min:30|max:100',
            'color'=>'required|in:red,green',
            'price'=>'nullable|numeric|min:1|max:100',
    
        ];
    }
    
    public function authorized():bool{
        return true;
    }
}
