<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function googleCallback(){
        try{
            $user=Socialite::driver('google')->user();
            $finduser=User::where('social_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return response()->json($finduser);
            }
            else{
                $newuser=User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                    'socail_type'=>'google',
                    'password'=>Hash::make('my-google'),

                ]);
                Auth::login($newuser);
                return response()->json($newuser);
            }
        }catch(Exception $e)
        {
            dd($e->getMessage());
    }

    }

    public function facebookCallback(){
        try{
            $user=Socialite::driver('facebook')->user();
            $finduser=User::where('social_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return response()->json($finduser);
            }
            else{
                $newuser=User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                    'socail_type'=>'facebook',
                    'password'=>Hash::make('my-facebook'),

                ]);
                Auth::login($newuser);
                return response()->json($newuser);
            }
        }catch(Exception $e)
        {
            dd($e->getMessage());
    }

    }
}
