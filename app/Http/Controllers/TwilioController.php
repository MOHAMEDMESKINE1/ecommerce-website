<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
class TwilioController extends Controller
{
   public static function sendMsg(){

    $receiveNumber = "+212704282927";
    $sid =  config('services.twilio.sid');
    $token =  config('services.twilio.token');
    $from =  config('services.twilio.number');
   
    $twilio = new Client($sid, $token);
    
    $message =  $twilio->messages->create($receiveNumber, // to
                               [
                                   "body" => "Hello There are a  new payment checkout your stripe account ",
                                   "from" => $from
                               ]
                      );
        

    return $message;
   }
}
