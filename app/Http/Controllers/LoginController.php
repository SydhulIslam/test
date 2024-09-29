<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        if( $user->save() )
        {
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





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
