<?php

namespace App\Http\Controllers;
use App\Models\LoanModel;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Auth;
class LoanController extends Controller
{
    public function list(Request $request )  {
        $data['header_title']="Loan List";
        $data['getRecord']=LoanModel::getLoans($request);
        return view('admin.loan.list', $data);
    }
    public function add($id)  {
       $data['header_title']="Add New Loan";
        return view('admin.loan.add', $data);
    }

    public function customer()  {
        $data['getRecord']=CustomerModel::getCustomer();
        $data['header_title']="All Customer List";
         return view('admin.loan.customer', $data);
     }

     public function details($id)
     {
         $loan = LoanModel::with(['customer', 'transactions'])->find($id);
     
         if (!$loan) {
             return redirect('admin/loan/list')->with('error', 'Loan not found');
         }
     
         return view('admin.loan.details', compact('loan'));
     }
     




     public function insert($id, Request $request)
     {
         $payingAmount = trim($request->payingAmount);
         $profitPercent = trim($request->profitPercent);
         $totalPayingAmount = $payingAmount + ($payingAmount * $profitPercent / 100);
     
         $share = new LoanModel;
         $share->customerID = $id;
         $share->adminID=Auth::user()->adminID;
         $share->payingAmount = $totalPayingAmount; 
         $share->profitPercent = $profitPercent;
         $share->diposite = trim($request->diposite);
         $share->instalmentNumber = trim($request->instalmentNumber);
         $share->meyadType = trim($request->meyadType);
         $share->loanType = 4;
         $share->startDate = trim($request->startDate);
         $share->save();
     
         $transaction = new TransactionModel();
         $transaction->loanID = $share->id;
         $transaction->adminID=Auth::user()->adminID;
         $transaction->colloectedBy = auth()->id();
         $transaction->payingAmount = $totalPayingAmount; 
         $transaction->date = trim($share->startDate);
         $transaction->transactionType = "New Loan";
         $transaction->loanType = trim($request->meyadType);
         $transaction->save();
     
         return redirect('admin/loan/list')->with('success', 'Loan successfully added');
     }
     


public function collection($id, Request $request) {

   // dd($request->all());
    $deposite=LoanModel::getSingle($id);

    $transaction = new TransactionModel();

    $transaction->loanID= $deposite->id;
    $transaction->adminID=Auth::user()->adminID;
    $transaction->transactionType="Collection";
    $transaction->colloectedBy = auth()->id();
    $transaction->date= $request->date;
    $transaction->receiveAmount= $request->receiveAmount;
    $transaction->loanType = $deposite->meyadType;
    $transaction->save();

    $deposite->dueInstallment +=$request->dueInstallment;
    $deposite->diposite +=$request->diposite;
    $deposite->save();

   
    return back()->with('success', 'Deposite successfully added');
}

public function withdraw($id)
{
    $loan = LoanModel::find($id);

    if (!$loan) {
        return back()->with('error', 'Loan record not found.');
    }

    TransactionModel::where('loanID', $loan->id)->delete();

    $loan->delete();

    return redirect('admin/loan/list')->with('success', 'Loan withdrawn successfully');
}

public function update($id, Request $request) {

    $savings= LoanModel::getSingle($id);
    $savings->payingAmount=$request->payingAmount;
    $savings->profitPercent=$request->profitPercent;
    $savings->diposite=$request->diposite;
    $savings->instalmentNumber=$request->instalmentNumber;
    $savings->meyadType=$request->meyadType;
    $savings->startDate=$request->startDate;

    $savings->save();
    return redirect("admin/loan/details/" .$id)->with('succsess', 'Successfully updated');
    // return back()->with('success', 'Successfully updated');

    
 }
}
