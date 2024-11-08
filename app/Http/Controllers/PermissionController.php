<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('permission:All Permissions', ['only' => ['index']]);
        $this->middleware('permission:Create Permission', ['only' => ['create']]);
        $this->middleware('permission:Edit Permission', ['only' => ['edit']]);
        $this->middleware('permission:Delete Permission', ['only' => ['destroy']]);
    }

    public function index(){

        $permissions = Permission::get();

        return view('role-permission.permission.index', [
            'permissions'=> $permissions]);
    }

    ////////////// create ///////////////////

    public function create(){
        return view('role-permission.permission.create');
    }

    ////////////// store ///////////////////

    public function store(Request $request){

        $request->validate([
            'name' => ['required','string','unique:permissions,name']
        ]);

        Permission::create(['name' => $request->name]);

        return redirect('permissions')->with('status','Permission Created Successfully');
    }

    ////////////// edit ///////////////////

    public function edit(Permission $permission){


        return view('role-permission.permission.edit', [
            'permission'=> $permission
        ]);
    }

    ////////////// update ///////////////////

    public function update(Request $request, Permission $permission){

        $request->validate([
            'name' => ['required','string','unique:permissions,name,' .$permission->id]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('status','Permission Updated Successfully');
    }

    ////////////// destroy ///////////////////

    public function destroy($permissionId){
        $permission = Permission::find($permissionId);
        $permission->delete();

        return redirect('permissions')->with('status','Permission Delete Successfully');
    }
}
