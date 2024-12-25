<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;
use App\Mail\ForgotPasswordMail;
use Mail;

class AuthController extends Controller


{
 public function login() {
   
   if(!empty(Auth::check())){
    if(Auth::user()->user_type==1){

      return redirect('admin/dashboard');

    }else if(Auth::user()->user_type==2){
      return redirect('admin/employee/dashboard');

    }

   }
    
   return view('auth.login');
  }



  public function AuthLogin(Request $request) 
  {
    
    $remember= !empty($request ->remember)? true:false;
    if(Auth::attempt(['mobile_number'=>$request->mobile_number, 'password'=>$request->password], $remember))
    {

      if(Auth::user()->user_type==1){

        return redirect('admin/dashboard');

      }else if(Auth::user()->user_type==2){
        return redirect('admin/employee/dashboard');

      }else if(Auth::user()->user_type==0){
        return redirect('admin/superadmin/dashboard');

      }
      

    }else{
      return redirect()->back()->with('error', 'Please enter your correct Mobile Number and Password');
    }
    
  }


  public function register()
{
  $data['header_title']="Registration";
  return view('auth.register', $data);


}
public function Authregister(Request $request)
{
   

    if ($request->password !== $request->password_confirmation) {
        return redirect()->back()->with('error', 'Password and confirm password do not match.');
    }

    $user = new User();
    $user->name = $request->name;
    $user->companyName = $request->companyName;
    $user->mobile_number = $request->mobile_number;
    $user->email = $request->email;
    $user->password = Hash::make($request->password); 
    $user->user_type = $request->user_type ?? 1; 
    $user->sms_balance = 10;
    $user->customer_balance = 5;
  
    $user->save();


    $user->adminID = $user->id;
    $user->save();
    return redirect('/')->with('success', 'Registration successful. Please log in.');
}


 public function forgotpassword() {

  return view('auth.forgot');
  
 }

 public function postforgotpassword(Request $request) {
  

   $user=User::getEmailSingle($request->email);
   if(!empty($user)){

    $user->remember_token=Str::random(30);
    $user->save();
    Mail::to($user->email)->send(new ForgotPasswordMail($user));

  
    return redirect()->back()->with('success', "Please check your email and reset your password");

   }else{

    return redirect()->back()->with('error', "Request email not found.");
   }
  
 }

 public function reset($remember_token) {

 $user=User::getTokenSingle($remember_token);

  if(!empty($user)){

    $data['user']=$user;
    return view('auth.reset');
  }
  
 }

 public function PostReset($token, Request $request){

  if($request->password == $request->cpassword){

    $user=User::getTokenSingle($token);
    $user->password=Hash::make($request->password);
    $user->remember_token=Str::random(30);
    $user->save();

    return redirect(url(''))->with('success', "Password successfully reset");


  }else{

    return redirect()->back()->with('error', "Password and Confirm Password does not match");

  }


  
 }

  public function logout() {

    Auth::logout();
    return redirect(url(''));

    
  }
}
