<?php

namespace App\Http\Requests;

class LoginRequest extends BaseRequestFormApi
{
public function rules(): array
{
    return[
      
        'email'=>'required|min:5|max:50|email',
        'password'=>'required|min:6|max:50',

    ];
}

public function authorized():bool{
    return true;
}
}
