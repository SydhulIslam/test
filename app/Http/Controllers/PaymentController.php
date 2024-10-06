<?php

namespace App\Http\Controllers;

use App\Mail\SendScore;
use App\Mail\paymentmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function view(){
        return view("payment.view");
    }

    public function store( ){
        $tomail = "ssydhul@gmail.com";
        $subject = "Payment Processed Successfully";
        $message = "Now you login and enjoy the website";

        $request = Mail::to($tomail)->send(new SendScore($subject, $message ));

        dd($request);
    }
}