<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
public function createUser($data):User{
    $data['password']=Hash::make($data['password']);
return User::create($data);
}
}
