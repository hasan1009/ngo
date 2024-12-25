<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use App\Models\CustomerModel;
use App\Models\InsuranceModel;
use Illuminate\Http\Request;
use Auth;
class InsuranceController extends Controller
{
    public function list(Request $request )  {
        $data['header_title']="Insurance List";
        $data['getRecord']=InsuranceModel::getLoans($request);
        return view('admin.insurance.list', $data);
    }
    public function add($id)  {
       $data['header_title']="Add New Share";
        return view('admin.insurance.add', $data);
    }

    public function customer()  {
        $data['getRecord']=CustomerModel::getCustomer();
        $data['header_title']="All Customer List";
         return view('admin.insurance.customer', $data);
     }

     public function details($id)
     {
         $loan = InsuranceModel::with(['customer', 'transactions'])->find($id);
     
         if (!$loan) {
             return redirect('admin/insurance/list')->with('error', 'Insurance not found');
         }
     
         return view('admin.insurance.details', compact('loan'));
     }
     




     public function insert($id, Request $request){
      

    $request->validate([
        'diposite' => 'nullable|numeric|min:0',
    ]);


       $share = new InsuranceModel;
       $share->customerID = $id;
       $share->adminID=Auth::user()->adminID;
       $share->loanAmount = trim($request->loanAmount);
       $share->profitPercent = trim($request->profitPercent);
       $share->diposite = trim($request->diposite);
       $share->meyad = trim($request->meyad);
       $share->meyadType = trim($request->meyadType);
       $share->loanType = 5;
       $share->startDate = trim($request->startDate);
       $share->save();


       $transaction = new TransactionModel();
       $transaction->loanID = $share->id;
       $transaction->adminID=Auth::user()->adminID;
       $transaction->receiveAmount = trim($request->loanAmount);
       $transaction->date = trim($share->startDate);
       $transaction->colloectedBy = auth()->id();
       $transaction->transactionType = "Insurance Deposite";
       $transaction->currentBalance =trim($share->loanAmount);
       

       $transaction->save();
    return redirect('admin/insurance/list')->with('success', 'Insurance successfully added');
}


public function deposit($id, Request $request) {
    $deposite=InsuranceModel::getSingle($id);

    $transaction = new TransactionModel();
    $transaction->loanID = $deposite->id;
    $transaction->adminID=Auth::user()->adminID;
    $transaction->receiveAmount = $request->loanAmount;
    $transaction->date = $deposite->created_at;
    $transaction->colloectedBy = auth()->id();
    $transaction->transactionType = "Insurance Deposite";
    $transaction->currentBalance = $deposite->loanAmount +$request->loanAmount;
    $transaction->save();



   
    $deposite->loanAmount +=$request->loanAmount;
    $deposite->save();

   
    return back()->with('success', 'Insurance successfully added');
}

public function withdraw($id)
{
    $loan = InsuranceModel::find($id);

    if (!$loan) {
        return back()->with('error', 'Loan record not found.');
    }

    TransactionModel::where('loanID', $loan->id)->delete();

    $loan->delete();

    return redirect('admin/insurance/list')->with('success', 'Insurance withdrawn successfully');
}

public function update($id, Request $request) {

    $savings= InsuranceModel::getSingle($id);
    $savings->profitPercent=$request->profitPercent;
    $savings->diposite=$request->diposite;
    $savings->meyad=$request->meyad;
    $savings->meyadType=$request->meyadType;
    $savings->startDate=$request->startDate;

    $savings->save();

    return back()->with('success', 'Successfully updated');

    
 }
}
