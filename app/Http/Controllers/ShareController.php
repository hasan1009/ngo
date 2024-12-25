<?php

namespace App\Http\Controllers;
use App\Models\ShareModel;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Auth;
class ShareController extends Controller
{
   
    public function list(Request $request )  {
        $data['header_title']="Share List";
        $data['getRecord']=ShareModel::getLoans($request);
        return view('admin.share.list', $data);
    }
    public function add($id)  {
       // $data['getRecord']=User::getEmployee();
       $data['header_title']="Add New Share";
        return view('admin.share.add', $data);
    }

    public function customer()  {
        $data['getRecord']=CustomerModel::getCustomer();
        $data['header_title']="All Customer List";
         return view('admin.share.customer', $data);
     }

     public function details($id)
     {
         $loan = ShareModel::with(['customer', 'transactions'])->find($id);
     
         if (!$loan) {
             return redirect('admin/share/list')->with('error', 'Loan not found');
         }
     
         return view('admin.share.details', compact('loan'));
     }
     




     public function insert($id, Request $request){
      

    $request->validate([
        'diposite' => 'nullable|numeric|min:0',
    ]);


       $share = new ShareModel;
       $share->customerID = $id;
       $share->adminID=Auth::user()->adminID;
       $share->loanAmount = trim($request->loanAmount);
       $share->profitPercent = trim($request->profitPercent);
       $share->diposite = trim($request->diposite);
       $share->meyad = trim($request->meyad);
       $share->meyadType = trim($request->meyadType);
       $share->loanType = 0;
       $share->startDate = trim($request->startDate);
       $share->save();

       $transaction = new TransactionModel();
       $transaction->loanID = $share->id;
       $transaction->adminID=Auth::user()->adminID;
       $transaction->receiveAmount = trim($request->loanAmount);
       $transaction->colloectedBy = auth()->id();
       $transaction->date = trim($share->startDate);
       $transaction->transactionType = "Share Deposite";
       $transaction->currentBalance =trim($share->loanAmount);
       

       $transaction->save();
    return redirect('admin/share/list')->with('success', 'Share successfully added');
}


public function deposit($id, Request $request) {
    $deposite=ShareModel::getSingle($id);

    $transaction = new TransactionModel();
    $transaction->loanID = $deposite->id;
    $transaction->adminID=Auth::user()->adminID;
    $transaction->receiveAmount = $request->loanAmount;
    $transaction->colloectedBy = auth()->id();
    $transaction->date = $deposite->created_at;
    $transaction->transactionType = "Share Deposite";
    $transaction->currentBalance = $deposite->loanAmount +$request->loanAmount;
    $transaction->save();



   
    $deposite->loanAmount +=$request->loanAmount;
    $deposite->save();

   
    return back()->with('success', 'Deposite successfully added');
}

public function withdraw($id)
{
    $loan = ShareModel::find($id);

    if (!$loan) {
        return back()->with('error', 'Loan record not found.');
    }

    TransactionModel::where('loanID', $loan->id)->delete();

    $loan->delete();

    return redirect('admin/share/list')->with('success', 'Loan withdrawn successfully');
}

public function update($id, Request $request) {

    $savings= ShareModel::getSingle($id);
    $savings->profitPercent=$request->profitPercent;
    $savings->diposite=$request->diposite;
    $savings->meyad=$request->meyad;
    $savings->meyadType=$request->meyadType;
    $savings->startDate=$request->startDate;

    $savings->save();

    return back()->with('success', 'Successfully updated');

    
 }

 

}
