<?php

namespace App\Http\Controllers;
use App\Models\FixedModel;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Auth;
class FixedController extends Controller
{
    public function list(Request $request )  {
        $data['header_title']="Fixed Deposite List";
        $data['getRecord']=FixedModel::getLoans($request);
        return view('admin.fixed.list', $data);
    }

    public function add($id)  {
       $data['header_title']="Add New Share";
        return view('admin.fixed.add', $data);
    }

    public function customer()  {
        $data['getRecord']=CustomerModel::getCustomer();
        $data['header_title']="All Customer List";
         return view('admin.fixed.customer', $data);
     }

     public function details($id)
     {
         $loan = FixedModel::with(['customer', 'transactions'])->find($id);
     
         if (!$loan) {
             return redirect('admin/fixed/list')->with('error', 'Loan not found');
         }
     
         return view('admin.fixed.details', compact('loan'));
     }
     




     public function insert($id, Request $request){
      

    $request->validate([
        'diposite' => 'nullable|numeric|min:0',
    ]);


       $share = new FixedModel;
       $share->customerID = $id;
       $share->adminID=Auth::user()->adminID;
       $share->loanAmount = trim($request->loanAmount);
       $share->profitPercent = trim($request->profitPercent);
       $share->diposite = trim($request->diposite);
       $share->meyad = trim($request->meyad);
       $share->meyadType = trim($request->meyadType);
       $share->loanType = 2;
       $share->startDate = trim($request->startDate);
       $share->save();


       $transaction = new TransactionModel();
       $transaction->loanID = $share->id;
       $transaction->adminID=Auth::user()->adminID;
       $transaction->receiveAmount = trim($request->loanAmount);
       $transaction->date = trim($share->startDate);
       $transaction->colloectedBy = auth()->id();
       $transaction->transactionType = "Fixed Deposite";
       $transaction->currentBalance =trim($share->loanAmount);
       $transaction->save();
    return redirect('admin/fixed/list')->with('success', 'Fixed Deposite successfully added');
}


public function deposit($id, Request $request) {
    $deposite=FixedModel::getSingle($id);

    $transaction = new TransactionModel();
    $transaction->loanID = $deposite->id;
    $transaction->adminID=Auth::user()->adminID;
    $transaction->receiveAmount = $request->loanAmount;
    $transaction->date = $deposite->created_at;
    $transaction->colloectedBy = auth()->id();
    $transaction->transactionType = "Fixed Deposite";
    $transaction->currentBalance = $deposite->loanAmount +$request->loanAmount;
    $transaction->save();

    $deposite->loanAmount +=$request->loanAmount;
    $deposite->save();

   
    return back()->with('success', 'Deposite successfully added');
}

public function withdraw($id)
{
    $loan = FixedModel::find($id);

    if (!$loan) {
        return back()->with('error', 'Loan record not found.');
    }

    TransactionModel::where('loanID', $loan->id)->delete();

    $loan->delete();

    return redirect('admin/fixed/list')->with('success', 'Loan withdrawn successfully');
}

public function update($id, Request $request) {

    $savings= FixedModel::getSingle($id);
    $savings->profitPercent=$request->profitPercent;
    $savings->diposite=$request->diposite;
    $savings->meyad=$request->meyad;
    $savings->meyadType=$request->meyadType;
    $savings->startDate=$request->startDate;

    $savings->save();

    return back()->with('success', 'Successfully updated');

    
 }
}
