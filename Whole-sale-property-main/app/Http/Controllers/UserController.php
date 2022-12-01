<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $users = User::all();
        $page_title = 'User Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
        

        return view('UserManagement.user.view', compact('users','page_title', 'page_description','action','logo'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function User_Form()
    {
        $page_title = 'User Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $roles = Role::all();    
        return view('UserManagement.user.form', compact('roles','page_title', 'page_description','action','logo','logoText'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(['email'=> $request->email], [
            'email' => ['required', 'unique:users,email']
        ]);

        if($validator->fails()){
            return redirect()->back()->with('warning', 'This Email already exists please try again with another one!');
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if($request->role!=null)
        $user->assignRole($request->role);
        else
        $user->assignRole('PO Owner / RFQ Owner');
        return redirect('/user')->with('success','New user has been added.');
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
    public function User_Edit($id)
    {
        $page_title = 'User Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $id = decrypt($id);
        $user = User::find($id);
        $roles = Role::all();
        return view('UserManagement.user.edit', compact('user', 'roles','page_title', 'page_description','action','logo','logoText'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

       
        if($request->role!=null)
        $user->syncRoles($request->role);
        else
        $user->syncRoles($user->roles[0]->name);

        return redirect('/user')->with('success','User has been updated.');
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
        $user = User::find($id);
        $user->delete();
        return back()->with('success','User has been deleted');
    }

    public function hide_qty(){
        $user = Auth::user();
        $user->hide_inventory_qty = !$user->hide_inventory_qty;
        $user->save();
        return back()->with('success','Setting has been updated');
    }
}
