<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    // Registion GET method
    public function registion_get(){
        return view('reg', [
            'title' => "Registion",
        ]);
    }


    // Registion POST method

    public function registion_post(Request $request){

        $info = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'user_photo' => 'required|image|mimes:png,jpg,jpeg',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);


        $user = new User;

        $user->name = $request->name;
        $user->username = implode( '' , explode ( ' ', $request->name ));
        $user->email = $request->email;

        $photo = $request->file('user_photo')->hashName();
        $request->file('user_photo')->storeAs('public/images',$photo);

        $user->user_photo = $photo;
        $user->password = bcrypt( $request->password );
        $user->assignRole('User');


        if( $user->save() )
        {
            event( new Registered($user) );

            Auth::login($user);
            return redirect()->route('deshbord.index')->with('message', 'Registration Successful');
        };

    }






   // Login GET method

    public function login_get(){
        return view('login', [
            'title' => "Login",
        ]);
    }

    // Login POST method

    public function login_post(Request $request){
        $logindata = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($logindata)) {
            return redirect()->route('deshbord.index');
        }else {
            return redirect()->route('login')->with('invalid', 'This User Not Exgiest');
        }
    }


    // LogOut

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }


    public function emailNotice(){
        return view('admin.user.verification-notice');
    }



    public function emailVerify(EmailVerificationRequest $request){

        $request->fulfill();

        return redirect()->route('deshbord.index')->with('message', 'Registration Successful');
    }

    public function resentVerify (Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function password_request(){
        return view('reset_password');
    }
    public function password_request_post(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with('massage', 'Password Reset Link sent Successful')
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function password_reset($token){
        return view('update_password' , ['token' => $token]);
    }

    public function password_update(Request $request){
        $request->validate ([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }



}

