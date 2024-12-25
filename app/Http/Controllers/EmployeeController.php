<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Hash;
use Auth;
use Str;

class EmployeeController extends Controller
{
    public function list()  {
        
        $data['getRecord']=User::getEmployee();
        $data['header_title']="Employee List";
        return view('admin.employee.list', $data);
    }

    public function add()  {
        $data['getRecord']=User::getEmployee();
        return view('admin.employee.add', $data);
    }



    public function insert(Request $request)
{

    
    $user = new User;
    $user->bangla_name = trim($request->bangla_name);
    $user->adminID=Auth::user()->adminID;
    $user->name = trim($request->name);
    $user->dob = $request->dob ? trim($request->dob) : null;
    $user->father_name = trim($request->father_name);
    $user->mother_name = trim($request->mother_name);
    $user->mobile_number = trim($request->mobile_number);
    $user->gender = trim($request->gender);
    $user->designation = trim($request->designation);
    $user->present_address = trim($request->present_address);
    $user->permanent_address = trim($request->permanent_address);
    $user->date_of_join = trim($request->date_of_join);

    if(!empty($request->password)){
        $user->password = Hash::make($request->password);

    }
  
    $user->user_type = 2;
    if(!empty($request->file('profile_pic'))){

        $ext=$request->file('profile_pic')->getClientOriginalExtension();
        $file=$request->file('profile_pic');
        $randomStr=date('Ymdhis').Str::random(20);
        $fileName=strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/',$fileName);

        $user->profile_pic=$fileName;
       }
   
   
    $user->save();

    // Redirect with success message
    return redirect('admin/employee/list')->with('success', 'An employee successfully added');
}


public function edit($id)  {

      
       
    $data['getRecord'] = User::getSingle($id);

    if(!empty($data['getRecord'])){
        $data['header_title']="Edit Customer";
        return view('admin.employee.edit', $data);

    }else{
        abort(404);
    }
   
}

public function update($id, Request $request) {

  

    // Retrieve the user by id
    $user = User::getSingle($id);

    // Update user details
    $user->bangla_name = trim($request->bangla_name);
    $user->name = trim($request->name);
    $user->dob = $request->dob ? trim($request->dob) : null;
    $user->father_name = trim($request->father_name);
    $user->mother_name = trim($request->mother_name);
    $user->mobile_number = trim($request->mobile_number);
    $user->gender = trim($request->gender);
    $user->designation = trim($request->designation);
    $user->present_address = trim($request->present_address);
    $user->permanent_address = trim($request->permanent_address);
    $user->date_of_join = trim($request->date_of_join);

    // Update password if provided
    if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
    }

    $user->user_type = 2;

    // Handle file upload for profile picture

    if(!empty($request->file('profile_pic'))){

        if(!empty($user->getProfile())){
            unlink('upload/profile/'.$user->profile_pic);

        }

        $ext=$request->file('profile_pic')->getClientOriginalExtension();
        $file=$request->file('profile_pic');
        $randomStr=date('Ymdhis').Str::random(20);
        $fileName=strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/',$fileName);

        $user->profile_pic=$fileName;
       }
  
    $user->save();

    // Redirect with success message
    return redirect("admin/employee/list")->with('success', 'Admin successfully edited');
}

    
public function delete($id) {

    $user= User::getSingle($id);
    $user->is_delete=1;
    $user->save();
    return redirect("admin/employee/list")->with('succsess', 'Employee succsessfully deleted');


    
   }


   public function report() {

    $data['getRecord'] = User::getEmployeeReports();
    $data['header_title']="Employee Report";
    return view('admin.employee.report', $data);
    
   }



}
