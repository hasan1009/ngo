<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Request;
use Auth;
class DpsModel extends Model
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
            ->where('loans.loanType', '=', 3)
            ->where('adminID','=' , Auth::user()->adminID);

        if (!empty($request->name)) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if (!empty($request->customerID)) {
            $query->where('customerID', 'like', '%' . $request->customerID . '%');
        }

        if (!empty($request->mobile)) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('mobile', 'like', '%' . $request->mobile . '%');
            });
        }

        return $query->orderBy('id', 'asc')->paginate(20);
    }
}
