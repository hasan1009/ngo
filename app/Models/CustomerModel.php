<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class CustomerModel extends Model
{
    use HasFactory;

    protected $table = 'customers'; 

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getCustomer()
    {
        $return = CustomerModel::select('customers.*')
            ->where('customers.is_delete', '=', 0)
            ->where('adminID','=' , Auth::user()->adminID);
            

        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('mobile'))) {
            $return = $return->where('mobile', 'like', '%' . Request::get('mobile') . '%');
        }

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }

        $return = $return->orderBy('id', 'asc')->paginate(20);

        return $return;
    }

    static public function getTotalCustomer()
    {
        return self::select('customers.id')
            ->where('is_delete', '=', 0)
            ->where('adminID','=' , Auth::user()->adminID)
            ->count();
    }


    static public function getLaser()
    {
        return CustomerModel::select(
            'customers.id',
            'customers.name',
            'customers.mobile',
            DB::raw('COALESCE(SUM(CASE WHEN loans.loanType = 0 THEN loans.loanAmount ELSE 0 END), 0) as totalShareAmount'),
            DB::raw('COALESCE(SUM(CASE WHEN loans.loanType = 1 THEN loans.loanAmount ELSE 0 END), 0) as totalSavingsAmount'),
            DB::raw('COALESCE(SUM(CASE WHEN loans.loanType = 2 THEN loans.loanAmount ELSE 0 END), 0) as totalFDRAmount'),
            DB::raw('COALESCE(SUM(CASE WHEN loans.loanType = 3 THEN loans.loanAmount ELSE 0 END), 0) as totalDPSAmount'),
            DB::raw('COALESCE(SUM(CASE WHEN loans.loanType = 4 THEN loans.payingAmount ELSE 0 END), 0) as totalLoanAmount'),
            DB::raw('COALESCE(SUM(CASE WHEN loans.loanType = 5 THEN loans.loanAmount ELSE 0 END), 0) as totalInsuranceAmount'),
        )
        ->leftJoin('loans', 'loans.customerID', '=', 'customers.id')
        ->where('customers.is_delete', '=', 0)
        ->where('customers.adminID', '=', Auth::user()->adminID)
        ->groupBy('customers.id', 'customers.name', 'customers.mobile')
        ->get();
    }
    



}
