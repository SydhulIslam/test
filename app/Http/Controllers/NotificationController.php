<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){

        $user = request()->user();
        

        $notifications = $user->notifications;

       return view("notification.index", compact("notifications"));
        
        // view("notification.index", compact("notifications"));
       
    }
}
