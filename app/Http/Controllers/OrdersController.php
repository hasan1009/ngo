<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function list()  {
        
        //$data['getRecord']=User::getAdmin();
        $data['header_title']="Order List";
        return view('admin.orders.list', $data);
    }
}
