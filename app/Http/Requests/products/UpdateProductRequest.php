<?php

namespace App\Http\Requests\products;

use App\Http\Requests\BaseRequestFormApi;

class UpdateProductRequest extends BaseRequestFormApi
{
    public function rules(): array
    {
        $id=$this->request()->segment(3);
        return[
          
            'title'=>'required|min:5|max:50|unique:products,title,'.$id.',id',
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
