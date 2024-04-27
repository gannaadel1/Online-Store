<?php

namespace App\Http\Requests;

class RegisterRequest extends BaseRequestFormApi
{
public function rules(): array
{
    return[
        'name'=>'max:50|required',
        'email'=>'required|min:5|max:50|email|unique:users',
        'password'=>'required|min:6|max:50|confirmed',

    ];
}

public function authorized():bool{
    return true;
}
}
