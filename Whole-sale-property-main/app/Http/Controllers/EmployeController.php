<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Validator;


class EmployeController extends Controller
{
    public function Employee_FORM()
    {
        $employes = Employee::all();
        $users = User::all();
        $page_title = 'Human Resource Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
                    
        return view('HumanResourceManagement.form', compact('users','employes','page_title', 'page_description','action','logo'));
    }

    public function Employee_LIST()
    {
        $employes = Employee::all();
        $page_title = 'Human Resource Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
                    
        return view('HumanResourceManagement.view', compact('employes','page_title', 'page_description','action','logo'));
    }

    public function store(Request $request)
    {
        $employe = new Employee();
        
        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->mobile_no = $request->mobile_no;
        $employe->work_no = $request->work_no;
        $employe->address = $request->address;
        $employe->user_id = $request->user_id;

        $alreadyExists = Employee::where('user_id',$request->user_id)->first();
        if ($alreadyExists) {
        return redirect('/employees')->with('warning','user Already Linked.');
        }
        else
        {
        $employe->save();
        return redirect('/employees')->with('success','New employe has been added.');        
        }

    }

    public function Employee_EDIT($id)
    {
        $id = decrypt($id);
        $employes = Employee::find($id);
        $users = User::all();
        $page_title = 'Human Resource Management';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $action = __FUNCTION__;
                    
        return view('HumanResourceManagement.edit', compact('users','employes','page_title', 'page_description','action','logo'));
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $employe = Employee::find($id);
        $employe->user_id = $request->user_id;
        
        $validator = Validator::make(['user_id'=> $request->user_id], [
            'user_id' => ['required', 'unique:employees,user_id,'.$employe->id.',id']
        ]);

        if($validator->fails()){
            return redirect('employee/edit/'.encrypt($employe->id))->with('warning', 'This User  already Linked please try again with another one!');
        }

        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->mobile_no = $request->mobile_no;
        $employe->work_no = $request->work_no;
        $employe->address = $request->address;
        //$employe->user_id = $request->user_id;
        $employe->save();

        return redirect('/employees')->with('success','User has been updated.');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $employe = Employee::find($id);
        $employe->delete();
        return back()->with('success','User has been deleted');
    }

    
}
