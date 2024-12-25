<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use App\Models\User;
use App\Models\CustomerModel;
use Auth;

class DashboardController extends Controller
{
     function dashboard() {
        
        $data['header_title']='Dashboard';
        if(Auth::user()->user_type==1){
            $data['totalCollection']=TransactionModel::getTotalCollection();
            $data['totalDistribution']=TransactionModel::getTotalDistribution();
            $data['totalAdmin']=User::getTotalUser(1);
            $data['totalEmployee']=User::getTotalUser(2);
            $data['totalCustomer']=CustomerModel::getTotalCustomer();
            return view('admin/dashboard', $data);
      
          }else if(Auth::user()->user_type==2){
            $data['totalCollection']=TransactionModel::getUserTotalCollection();
            $data['totalDistribution']=TransactionModel::getUserTotalDistribution();
            return view('admin/employee/dashboard', $data);
      
          }else if(Auth::user()->user_type==0){
            $data['totalCollection']=TransactionModel::getUserTotalCollection();
            $data['totalDistribution']=TransactionModel::getUserTotalDistribution();
            return view('admin/superadmin/dashboard', $data);
      
          }
        
    }
}
