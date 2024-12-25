<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EmployeeMiddleware;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\FixedController;
use App\Http\Controllers\DpsController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExpanseController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrdersController;






Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'Authregister']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('forgot-password',[AuthController::class,'forgotpassword']);
Route::post('forgot-password',[AuthController::class,'postforgotpassword']);
Route::get('reset/{token}',[AuthController::class,'reset']);
Route::post('reset/{token}',[AuthController::class,'PostReset']);



Route::group(['middleware='=>'useradmin'], function(){

  //     // admin///
   Route::get('admin/dashboard', [DashboardController::class,'dashboard']);
   Route::get('admin/admin/list', [AdminController::class,'list']);
   Route::get('admin/admin/add', [AdminController::class,'add']);
   Route::post('admin/admin/add', [AdminController::class,'insert']);
   Route::get('admin/admin/edit/{id}', [AdminController::class,'edit']);
   Route::post('admin/admin/edit/{id}', [AdminController::class,'update']);
   Route::get('admin/admin/delete/{id}', [AdminController::class,'delete']);

//    ///employee///
   Route::get('admin/employee/add',[EmployeeController::class,'add']);
   Route::get('admin/employee/list',[EmployeeController::class,'list']);
   Route::post('admin/employee/add', [EmployeeController::class,'insert']);
   Route::get('admin/employee/edit/{id}',[EmployeeController::class,'edit']);
   Route::post('admin/employee/edit/{id}',[EmployeeController::class,'update']);
   Route::get('admin/employee/delete/{id}',[EmployeeController::class,'delete']);
   Route::get('admin/employee/report',[EmployeeController::class,'report']);
   
//    ////Customers////
   Route::get('admin/customer/list', [CustomerController::class,'list']);
   Route::get('admin/customer/add', [CustomerController::class,'add']);
   Route::post('admin/customer/add', [CustomerController::class,'insert']);
   Route::get('admin/customer/edit/{id}', [CustomerController::class,'edit']);
   Route::post('admin/customer/edit/{id}', [CustomerController::class,'update']);
   Route::get('admin/customer/delete/{id}', [CustomerController::class,'delete']);
   Route::get('admin/customer/details/{id}', [CustomerController::class,'details']);
   Route::get('admin/customer/editnominee/{id}', [CustomerController::class,'editnominee']);
   Route::post('admin/customer/editnominee/{id}', [CustomerController::class,'updateNominee']);
   Route::get('admin/customer/laser', [CustomerController::class,'laser']);
   Route::get('admin/customer/report', [CustomerController::class,'report']);
   


//    ///share///
   Route::get('admin/share/add/{id}', [ShareController::class,'add']);
   Route::get('admin/share/list', [ShareController::class,'list']);   
   Route::get('admin/share/customer', [ShareController::class,'customer']);
   Route::post('admin/share/add/{id}', [ShareController::class,'insert']);
   Route::get('admin/share/details/{id}', [ShareController::class,'details']);
   Route::post('admin/share/deposit/{id}', [ShareController::class,'deposit']);
   Route::delete('admin/share/withdraw/{id}', [ShareController::class,'withdraw']);
   Route::post('admin/share/update/{id}', [ShareController::class,'update']);

//    ///Savings///
   Route::get('admin/savings/add/{id}', [SavingsController::class,'add']);
   Route::get('admin/savings/list', [SavingsController::class,'list']);
   Route::get('admin/savings/customer', [SavingsController::class,'customer']);
   Route::post('admin/savings/add/{id}', [SavingsController::class,'insert']);
   Route::get('admin/savings/details/{id}', [SavingsController::class,'details']);
   Route::post('admin/savings/deposit/{id}', [SavingsController::class,'deposit']);
   Route::post('admin/savings/withdraw/{id}', [SavingsController::class,'withdraw']);
   Route::post('admin/savings/update/{id}', [SavingsController::class,'update']);


//    ///Fixed Deposite///
   Route::get('admin/fixed/add/{id}', [FixedController::class,'add']);
   Route::get('admin/fixed/list', [FixedController::class,'list']);
   Route::get('admin/fixed/customer', [FixedController::class,'customer']);
   Route::post('admin/fixed/add/{id}', [FixedController::class,'insert']);
   Route::get('admin/fixed/details/{id}', [FixedController::class,'details']);
   Route::post('admin/fixed/deposit/{id}', [FixedController::class,'deposit']);
   Route::delete('admin/fixed/withdraw/{id}', [FixedController::class,'withdraw']);
   Route::post('admin/fixed/update/{id}', [FixedController::class,'update']);


//    ///DPS///
   Route::get('admin/dps/add/{id}', [DpsController::class,'add']);
   Route::get('admin/dps/list', [DpsController::class,'list']);
   Route::get('admin/dps/customer', [DpsController::class,'customer']);
   Route::post('admin/dps/add/{id}', [DpsController::class,'insert']);
   Route::get('admin/dps/details/{id}', [DpsController::class,'details']);
   Route::post('admin/dps/deposit/{id}', [DpsController::class,'deposit']);
   Route::delete('admin/dps/withdraw/{id}', [DpsController::class,'withdraw']);
   Route::post('admin/dps/update/{id}', [DpsController::class,'update']);

//    ///Loan///
   Route::get('admin/loan/add/{id}', [LoanController::class,'add']);
   Route::get('admin/loan/list', [LoanController::class,'list']);
   Route::get('admin/loan/customer', [LoanController::class,'customer']);
   Route::post('admin/loan/add/{id}', [LoanController::class,'insert']);
   Route::get('admin/loan/details/{id}', [LoanController::class,'details']);
   Route::post('admin/loan/collection/{id}', [LoanController::class,'collection']);
   Route::delete('admin/loan/withdraw/{id}', [LoanController::class,'withdraw']);
   Route::post('admin/loan/update/{id}', [LoanController::class,'update']);

//     ///Insurance///
    Route::get('admin/insurance/add/{id}', [InsuranceController::class,'add']);
    Route::get('admin/insurance/list', [InsuranceController::class,'list']);
    Route::get('admin/insurance/customer', [InsuranceController::class,'customer']);
    Route::post('admin/insurance/add/{id}', [InsuranceController::class,'insert']);
    Route::get('admin/insurance/details/{id}', [InsuranceController::class,'details']);
    Route::post('admin/insurance/deposit/{id}', [InsuranceController::class,'deposit']);
    Route::delete('admin/insurance/withdraw/{id}', [InsuranceController::class,'withdraw']);
    Route::post('admin/insurance/update/{id}', [InsuranceController::class,'update']);
   
//   ///Transaction///
  Route::get('admin/transactions/list', [TransactionController::class,'list']);

//   ////Expenses
  Route::get('admin/expense/add', [ExpanseController::class,'add']);
  Route::post('admin/expense/add', [ExpanseController::class,'insert']);
  Route::get('admin/expense/list', [ExpanseController::class,'list']);
  Route::get('admin/expense/print', [ExpanseController::class,'print']);
  Route::get('admin/expense/edit/{id}',[ExpanseController::class,'edit']);
  Route::post('admin/expense/edit/{id}',[ExpanseController::class,'update']);
  Route::delete('admin/expense/delete/{id}', [ExpanseController::class,'delete']);


  Route::get('admin/employee/dashboard', [DashboardController::class,'dashboard']);


  ///settings

  Route::get('admin/settings/add', [SettingsController::class,'add']);
  Route::post('admin/settings/add', [SettingsController::class,'insert']);


  /////Superadmin
  Route::get('admin/superadmin/dashboard', [DashboardController::class,'dashboard']);
 

  ///SMS
  Route::get('admin/sms/sms/{id}', [SmsController::class,'sms']);
  Route::post('admin/sms/send', [SmsController::class, 'sendSms'])->name('sms.send');

  ///Package
  Route::get('admin/package/add', [PackageController::class,'add']);
  Route::post('admin/package/add', [PackageController::class,'insert']);
  Route::get('admin/package/list', [PackageController::class,'list']);
  Route::get('admin/package/edit/{id}', [PackageController::class,'edit']);
  Route::post('admin/package/edit/{id}', [PackageController::class,'update']);
  Route::get('admin/package/delete/{id}', [PackageController::class,'delete']);
  Route::get('admin/package/package', [PackageController::class,'package']);
  Route::post('admin/package/package/{id}', [PackageController::class,'checkout']);

  ///SMS Package
  Route::get('admin/sms_package/add_sms', [PackageController::class,'add_sms']);
  Route::post('admin/sms_package/add_sms', [PackageController::class,'insert_sms']);
  Route::get('admin/sms_package/edit_sms/{id}', [PackageController::class,'edit_sms']);
  Route::post('admin/sms_package/edit_sms/{id}', [PackageController::class,'update_sms']);
  Route::get('admin/sms_package/list_sms', [PackageController::class,'list_sms']);
  Route::get('admin/sms_package/delete_sms/{id}', [PackageController::class,'delete_sms']);
  Route::get('admin/package/sms_package', [PackageController::class,'sms_package']);

  ///Orders
  Route::get('admin/orders/list', [OrdersController::class,'list']);
 

});


Route::group(['middleware='=>'common'], function(){
   Route::get('chat', [ChatController::class,'chat']);
   Route::post('submit_message', [ChatController::class,'submit_message']);
   Route::post('get_chat_windows', [ChatController::class,'get_chat_windows']);
   Route::post('get_chat_search_user', [ChatController::class,'get_chat_search_user']);
});
