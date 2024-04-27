<?php

namespace App\Http\Controllers\api;

use App\Traits\ApiResponse;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\RegisterService;
use App\Models\User;


class AuthController extends Controller
{
    use ApiResponse;
    


    public RegisterService $regiserService;
    public function __construct(RegisterService $regiserService)
    {
        $this->regiserService=$regiserService;
    }
    public function register(RegisterRequest $registerRequest)
    {
        
        if(!empty($registerRequest->getErrors())){
            return response()->json($registerRequest->getErrors(),406);
        }

        $user=$this->regiserService->createUser($registerRequest->request()->all());
        $message['user']=$user;
        $message['token']=$user->createToken('user-token')->plainTextToken;
        return $this->ApiResponse($message);
        

    }

    public function login(LoginRequest $loginRequest){
        if(!empty($loginRequest->getErrors())){
            return response()->json($loginRequest->getErrors(),406);
        }
        $request=$loginRequest->request();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           /** @var \App\Models\User $user **/  $user = Auth::user();
            $success['token'] =  $user->createToken('user-token')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->ApiResponse($success);
        }
        else{
            return $this->ApiResponse('Unauthorized', 'fail',401);
        }
    }
}
