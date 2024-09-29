<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('search');
        $title = 'All Users';

        $users = User::where('name','like', '%'.$keyword.'%')
                ->orWhere('email','like', '%'.$keyword.'%')
                ->orderBy('id', 'desc') -> paginate('10');

        return view ("admin.user.all_users", compact( 'users', 'keyword' , 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'User Create';

        return view ("admin.user.create_user", compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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

        $user->save();

        return redirect()->route('user.index')->with('message', 'Registration Successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $title = "Edit User";



        return view ("admin.user.edit_user", compact('user', 'title'));
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
        $user = User::find($id);

        $user->name             = $request->name;
        $user->username         = implode( '' , explode ( ' ', $request->name ));
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);

        if($request->file('user_photo') != null ){

            $thumbnail_name = $request->file('user_photo')->hashname();

            $request->file('user_photo')->storeAs('public/images', $thumbnail_name);

            $user->user_photo = $thumbnail_name ;
        }

        $user->save();

        return redirect()->route('user.index')->with('message', 'User has been Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('danger', 'User Delete Successfully!');
    }

    public function my_profile()
    {
        $title = 'My Profile';
        $user = auth()->user();

        return view('admin.user.user_profile', compact('title','user'));


        // $user->name             = $request->name;
        // $user->username         = implode( '' , explode ( ' ', $request->name ));
        // $user->email            = $request->email;
        // $user->password         = bcrypt($request->password);

        // if($request->file('user_photo') != null ){

        //     $thumbnail_name = $request->file('user_photo')->hashname();

        //     $request->file('user_photo')->storeAs('public/images', $thumbnail_name);

        //     $user->user_photo = $thumbnail_name ;
        // }

        // $user->save();

        // return redirect()->route('user.index')->with('message', 'User has been Update Successfully!');

    }
}
