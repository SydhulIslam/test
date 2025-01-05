<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:All Roles', ['only' => ['index']]);
        $this->middleware('permission:Create Role', ['only' => ['create']]);
        $this->middleware('permission:Edit Role', ['only' => ['edit']]);
        $this->middleware('permission:Delete Role', ['only' => ['destroy']]);
    }

    public function index(){

        $roles = Role::get();

        return view('role-permission.roles.index', compact('roles'));
    }

    ////////////// create ///////////////////

    public function create(){
        return view('role-permission.roles.create');
    }

    ////////////// store ///////////////////

    public function store(Request $request){

        $request->validate([
            'name' => ['required','string','unique:roles,name']
        ]);

        Role::create(['name' => $request->name]);

        return redirect('roles')->with('status','Permission Created Successfully');
    }

    ////////////// edit ///////////////////

    public function edit(Role $role){


        return view('role-permission.roles.edit', compact('role'));
    }

    ////////////// update ///////////////////

    public function update(Request $request, Role $role){
        $request->validate([
            'name' => ['required','string','unique:roles,name,' .$role->id]
        ]);
        $role->update([
            'name' => $request->name
        ]);
        return redirect('roles')->with('status','Role Updated Successfully');
    }

    ////////////// destroy ///////////////////

    public function destroy($roleId){

        $role = Role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status','Role Delete Successfully');
    }

    public function addPermissionToRole( $roleId){

        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermission = DB::table('role_has_permissions')
                ->where('role_has_permissions.role_id', $role->id)
                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                ->all();

        return view('role-permission.roles.add-permission', compact('role','permissions','rolePermission'));
    }

    public function givePermissionToRole(Request $request, $roleId){

        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permission added to role');
    }

}
