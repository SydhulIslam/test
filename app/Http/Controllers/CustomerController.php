<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerController extends Controller
{
        // Registion GET method
        public function registion_get(){
            return view('customer.cus_reg', [
                'title' => "Registion",
            ]);
        }


        // Registion POST method

        public function registion_post(Request $request){

            $info = $request->validate([

                'name' => 'required|max:50',
                'email' => 'required|email|unique:customers',
                'photo' => 'required|image|mimes:png,jpg,jpeg',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8'

            ]);


            $user = new Customer ;

            $user->name = $request->name ;
            $user->username = implode( '' , explode ( ' ', $request->name )) ;
            $user->email = $request->email ;

            $photo_name = $request->file('photo')->hashName() ;
            $request->file('photo')->storeAs('public/images',$photo_name ) ;

            $user->photo = $photo_name  ;
            $user->password = $request->password ;

            if( $user->save() )
            {

                Auth::guard('customer')->login($user) ;
                return redirect()->route('cus_deshbord')->with('message', 'Registration Successful');

            } ;

        }






       // Login GET method

        public function login_get(){
            return view('customer.cus_login', [
                'title' => "Login",
            ]);
        }

        // Login POST method

        public function login_post(Request $request){

            $logindata = $request->validate([
                'email' => 'required|email|exists:customers,email',
                'password' => 'required|min:8'
            ]);

            if (Auth::guard('customer')->attempt($logindata)) {
                return redirect()->route('customer.deshbord');
            }else {
                return redirect()->route('customer.login')->with('invalid', 'This User Not Exgiest');
            }
        }


        // LogOut

        public function logout(Request $request){

            Auth::guard('customer')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('customer.login');
        }

        // Deshbord

        public function deshbord()
        {
            return view ('customer.customer_profile');
        }
}
