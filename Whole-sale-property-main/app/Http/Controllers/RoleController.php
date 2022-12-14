<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function roles()
    {
        $roles = Role::all();
        $page_title = 'User Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
            
        return view('UserManagement.roles.view', compact('roles','page_title', 'page_description','action','logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Roles_Form()
    {
        $permissions = Permission::all();
        $page_title = 'User Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
            
        return view('UserManagement.roles.form', compact('permissions','page_title', 'page_description','action','logo'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->role_name,
                                'description' => $request->role_description,
                            ]);
        $role->syncPermissions($request->role_permissions);

        return redirect('/roles')->with('success','Role has been Added.');
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
    public function Roles_Edit($id)
    {
        $id = decrypt($id);
        $role = Role::find($id);
        $permissions = Permission::all();
        $page_title = 'User Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
            
        return view('UserManagement.roles.edit', compact('role','permissions','page_title', 'page_description','action','logo'));
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
        $id = decrypt($id);
        $role = Role::find($id);
        $role->name = $request->role_name;
        $role->description = $request->role_description;
        $role->save();
        $role->syncPermissions($request->role_permissions);
        return redirect('/roles')->with('success','Role has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        $role = Role::find($id);

        if (User::role($role->name)->first() != null) {
            return back()->with('warning','This role has been assigned to one or more users, change those before you can delete this.');
        }
        else{
            $role->delete();
            return back()->with('success','Role has been deleted');
        }
    }

    public function role_check(Request $request){
        if (Role::where('name', $request->rolename)->exists()) {
            return response()->json(['success' =>'found']);
        }
        else{
            return response()->json(['success' => 'not_found']);
        }
    }
}
