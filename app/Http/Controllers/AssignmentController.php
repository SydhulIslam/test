<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ScoreNotification;
use Illuminate\Support\Facades\Notification;

class AssignmentController extends Controller
{
    public function notification(){
        return view("student.assignment");
    }

    public function score(){
        //mail send

        // Mail::raw("Your Score", function($massage){
        //     $massage->to("ssydhul@gmail.com")
        //             ->subject("Assignment Score");
        // });

        $user = User::find(1);
        $score = request('score');
        $states = 'good';

        $user->notify(new ScoreNotification($score, $states));

        //Notification::route('mail', $user)->notify(new ScoreNotification($score));
    }

}
