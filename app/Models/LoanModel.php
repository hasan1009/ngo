<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class LoanModel extends Model
{
    use HasFactory;

    protected $table = 'loans'; 

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customerID', 'id');
    }

    static public function getSingle($id){
        return self::find($id);
    }

    public function transactions()
    {
        return $this->hasMany(TransactionModel::class, 'loanID', 'id');
    }



    
    static public function getLoans($request)
    {
        $query = self::with(['customer', 'transactions']) 
            ->select('loans.*')
            ->where('loans.loanType', '=', 4)
            ->where('adminID','=' , Auth::user()->adminID);

        // Filter by customer name
        if (!empty($request->name)) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        // Filter by customer ID
        if (!empty($request->customerID)) {
            $query->where('customerID', 'like', '%' . $request->customerID . '%');
        }

        // Filter by customer mobile
        if (!empty($request->meyadType)) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('meyadType', 'like', '%' . $request->meyadType . '%');
            });
        }

        return $query->orderBy('id', 'asc')->paginate(20);
    }

   
   
}
