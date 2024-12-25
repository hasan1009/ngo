<?php

namespace App\Http\Controllers;
use App\Models\DpsModel;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Auth;

class DpsController extends Controller
{
    public function list(Request $request )  {
        $data['header_title']="DPS List";
        $data['getRecord']=DpsModel::getLoans($request);
        return view('admin.dps.list', $data);
    }
    public function add($id)  {
       // $data['getRecord']=User::getEmployee();
       $data['header_title']="Add New DPS";
        return view('admin.dps.add', $data);
    }

    public function customer()  {
        $data['getRecord']=CustomerModel::getCustomer();
        $data['header_title']="All Customer List";
         return view('admin.dps.customer', $data);
     }

     public function details($id)
     {
         $loan = DpsModel::with(['customer', 'transactions'])->find($id);
     
         if (!$loan) {
             return redirect('admin/dps/list')->with('error', 'Loan not found');
         }
     
         return view('admin.dps.details', compact('loan'));
     }
     




     public function insert($id, Request $request){
      

    $request->validate([
        'diposite' => 'nullable|numeric|min:0',
    ]);


       $share = new DpsModel;
       $share->customerID = $id;
       $share->adminID=Auth::user()->adminID;
       $share->loanAmount = trim($request->loanAmount);
       $share->profitPercent = trim($request->profitPercent);
       $share->diposite = trim($request->diposite);
       $share->meyad = trim($request->meyad);
       $share->meyadType = trim($request->meyadType);
       $share->loanType = 3;
       $share->startDate = trim($request->startDate);
       $share->save();


       $transaction = new TransactionModel();
       $transaction->loanID = $share->id;
       $transaction->adminID=Auth::user()->adminID;
       $transaction->receiveAmount = trim($request->loanAmount);
       $transaction->date = trim($share->startDate);
       $transaction->colloectedBy = auth()->id();
       $transaction->transactionType = "DPS Deposite";
       $transaction->currentBalance =trim($share->loanAmount);
       

       $transaction->save();
    return redirect('admin/dps/list')->with('success', 'DPS successfully added');
}


public function deposit($id, Request $request) {
    $deposite=DpsModel::getSingle($id);

    $transaction = new TransactionModel();
    $transaction->loanID = $deposite->id;
    $transaction->adminID=Auth::user()->adminID;
    $transaction->receiveAmount = $request->loanAmount;
    $transaction->date = $deposite->created_at;
    $transaction->transactionType = "DPS Deposite";
    $transaction->colloectedBy = auth()->id();
    $transaction->currentBalance = $deposite->loanAmount +$request->loanAmount;
    $transaction->save();



   
    $deposite->loanAmount +=$request->loanAmount;
    $deposite->save();

   
    return back()->with('success', 'DPS successfully added');
}

public function withdraw($id)
{
    $loan = DpsModel::find($id);

    if (!$loan) {
        return back()->with('error', 'DPS record not found.');
    }
 
    TransactionModel::where('loanID', $loan->id)->delete();

    $loan->delete();

    return redirect('admin/dps/list')->with('success', 'DPS withdrawn successfully');
}

public function update($id, Request $request) {

    $savings= DpsModel::getSingle($id);
    $savings->profitPercent=$request->profitPercent;
    $savings->diposite=$request->diposite;
    $savings->meyad=$request->meyad;
    $savings->meyadType=$request->meyadType;
    $savings->startDate=$request->startDate;

    $savings->save();

    return back()->with('success', 'Successfully updated');

    
 }
}
