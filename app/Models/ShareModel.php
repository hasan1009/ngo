<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class ShareModel extends Model
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
        $query = self::with(['customer', 'transactions']) // Eager load customer and transactions
            ->select('loans.*')
            ->where('loans.loanType', '=', 0)
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
        if (!empty($request->mobile)) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('mobile', 'like', '%' . $request->mobile . '%');
            });
        }

        return $query->orderBy('id', 'asc')->paginate(20);
    }
   




}
