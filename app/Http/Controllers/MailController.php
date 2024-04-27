<?php

namespace App\Http\Controllers;

use App\Mail\EmailMaillable;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    use ApiResponse;
    public function send(){
        Mail::to(Auth::user()->email)->send(new EmailMaillable());
        return $this->ApiResponse('email sent');
    }
}
