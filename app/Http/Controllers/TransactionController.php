<?php

namespace App\Http\Controllers;
use App\Models\TransactionModel;
use Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function list(Request $request)
{
    $data['header_title'] = "Transaction List";
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $data['getRecord'] = TransactionModel::getTransaction($fromDate, $toDate);
    return view('admin.transactions.list', $data);
}


   


}
