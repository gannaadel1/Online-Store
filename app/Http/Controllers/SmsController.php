<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function send(){
        $basic  = new \Vonage\Client\Credentials\Basic("b6757336", "LnxhLGb28ee7BHch");
$client = new \Vonage\Client($basic);
$response = $client->sms()->send(
    new \Vonage\SMS\Message\SMS("201097961411", 'ganna', 'A text message sent using the vontage SMS API')
);

return response()->json('meya meya');
    }
}
