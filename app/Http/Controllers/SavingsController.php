<?php

namespace App\Http\Controllers;

use App\Models\SavingsModel;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Auth;
class SavingsController extends Controller
{
    public function list(Request $request )  {
        $data['header_title']="Savings List";
        $data['getRecord']=SavingsModel::getLoans($request);
        return view('admin.savings.list', $data);
    }
    public function add($id)  {
       $data['header_title']="Add New Share";
        return view('admin.savings.add', $data);
    }

    public function customer()  {
        $data['getRecord']=CustomerModel::getCustomer();
        $data['header_title']="All Customer List";
         return view('admin.savings.customer', $data);
     }

     public function details($id)
     {
         $loan = SavingsModel::with(['customer', 'transactions'])->find($id);
     
         if (!$loan) {
             return redirect('admin/savings/list')->with('error', 'Loan not found');
         }
     
         return view('admin.savings.details', compact('loan'));
     }
     




     public function insert($id, Request $request){
      

    $request->validate([
        'diposite' => 'nullable|numeric|min:0',
    ]);


       $share = new SavingsModel;
       $share->customerID = $id;
       $share->adminID=Auth::user()->adminID;
       $share->loanAmount = trim($request->loanAmount);
       $share->profitPercent = trim($request->profitPercent);
       $share->diposite = trim($request->diposite);
       $share->meyad = trim($request->meyad);
       $share->meyadType = trim($request->meyadType);
       $share->loanType = 1;
       $share->startDate = trim($request->startDate);
       $share->save();


       $transaction = new TransactionModel();
       $transaction->loanID = $share->id;
       $transaction->adminID=Auth::user()->adminID;
       $transaction->receiveAmount = trim($request->loanAmount);
       $transaction->date = trim($share->startDate);
       $transaction->colloectedBy = auth()->id();
       $transaction->transactionType = "Savings Deposite";
       $transaction->currentBalance =trim($share->loanAmount);
       

       $transaction->save();
    return redirect('admin/savings/list')->with('success', 'Savings successfully added');
}


public function deposit($id, Request $request) {
    $deposite=SavingsModel::getSingle($id);

    $transaction = new TransactionModel();
    $transaction->loanID = $deposite->id;
    $transaction->adminID=Auth::user()->adminID;
    $transaction->receiveAmount = $request->loanAmount;
    $transaction->date = $deposite->created_at;
    $transaction->colloectedBy = auth()->id();
    $transaction->transactionType = "Savings Deposite";
    $transaction->currentBalance = $deposite->loanAmount +$request->loanAmount;
    $transaction->save();

    $deposite->loanAmount +=$request->loanAmount;
    $deposite->save();

   
    return back()->with('success', 'Deposite successfully added');
}

public function withdraw($id, Request $request)
{
    // Debug incoming request
    // dd($request->all());

    $deposite = SavingsModel::getSingle($id);

    // Validate data
    $request->validate([
        'payingAmount' => 'required|numeric',
    ]);

    $transaction = new TransactionModel();
    $transaction->loanID = $deposite->id;
    $transaction->payingAmount = $request->payingAmount; 
    $transaction->date = $deposite->date;
    $transaction->transactionType = "Withdraw Deposit";
    $transaction->save();

    $deposite->loanAmount -= $request->payingAmount;
    $deposite->save();

    return back()->with('success', 'Savings successfully withdrawn');
}


     public function update($id, Request $request) {

        $savings= SavingsModel::getSingle($id);
        $savings->profitPercent=$request->profitPercent;
        $savings->diposite=$request->diposite;
        $savings->meyad=$request->meyad;
        $savings->meyadType=$request->meyadType;
        $savings->startDate=$request->startDate;

        $savings->save();

        return back()->with('success', 'Successfully updated');

        
     }

    
}
