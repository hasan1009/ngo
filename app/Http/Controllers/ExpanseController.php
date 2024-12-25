<?php

namespace App\Http\Controllers;
use App\Models\ExpenseModel;
use Illuminate\Http\Request;
use Auth;
class ExpanseController extends Controller



{


    public function add()  {
        
        $data['header_title']="Add New Expense";
        return view('admin.expense.add', $data);
    }


    public function edit($id)  {
       
        $data['getRecord'] = ExpenseModel::getSingle($id);
            $data['header_title']="Edit Expense";
            return view('admin.expense.edit', $data);
    }

    public function update( $id,Request $request){

        $request->validate([
            'expenseAmount' => 'required|numeric',
        ]);
        
        $expense = ExpenseModel::getSingle($id);
        $expense->adminID=Auth::user()->adminID;
        $expense->expenseType=trim($request->expenseType);
        $expense->expenseAmount=$request->expenseAmount;
        $expense->save();

        return redirect("admin/expense/list")->with('succsess', 'An expense successfully edited');
    }


    public function list(Request $request)  {
        $data['header_title']="Expense List";
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $data['getRecord']=ExpenseModel::getExpanse($fromDate, $toDate);
        return view('admin.expense.list', $data);
    }


    public function print(Request $request)  {
        $data['header_title']="Print List";
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $data['getRecord']=ExpenseModel::getExpanse($fromDate, $toDate);
        return view('admin.expense.print', $data);
    }


    public function insert(Request $request){

        $expense= new ExpenseModel;
        $expense->adminID=Auth::user()->adminID;
        $expense->expenseType=trim($request->expenseType);
        $expense->expenseAmount=$request->expenseAmount;
        $expense->is_delete=0;
        $expense->created_at=trim($request->created_at);
        $expense->save();

        return redirect("admin/expense/list")->with('succsess', 'An expense successfully added');
    }

    public function delete($id)
{
    $expense = ExpenseModel::find($id);

    if (!$expense) {
        return back()->with('error', 'Expense record not found.');
    }

    ExpenseModel::where('id', $expense->id)->delete();

    $expense->delete();

    return redirect('admin/expense/list')->with('success', 'Expense deleted successfully');
}


}
