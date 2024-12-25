<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use Illuminate\Http\Request;


class TransactionModel extends Model
{
    use HasFactory;

    protected $table = 'transaction'; 

    public static function getTotalCollection()
    {
     
        $todayDate = Carbon::today()->format('Y-m-d');
        $totalCollection = self::whereDate('date', $todayDate)
        ->where('adminID','=' , Auth::user()->adminID)
            ->sum('receiveAmount'); 

        return $totalCollection;
    }

    public static function getTotalDistribution()  {

        $todayDate = Carbon::today()->format('Y-m-d');
        $totalDistribution = self::whereDate('date', $todayDate)
        ->where('adminID','=' , Auth::user()->adminID)
            ->sum('payingAmount'); 

        return $totalDistribution;

        
    }

    public static function getReport($fromDate = null, $toDate = null)
{
    $query = self::select('transaction.*')
        ->where('transactionType', '=', 'Collection')
        ->where('adminID','=' , Auth::user()->adminID);
    
    // Apply date range filter if both dates are provided
    if ($fromDate && $toDate) {
        $query->whereBetween('date', [$fromDate, $toDate]);
    }

    return $query->get();
}

public static function getTransaction($fromDate = null, $toDate = null, $request = null)
{
    $return = self::select('transaction.*', 'users.name as collected_by_name')
                  ->join('users', 'users.id', '=', 'transaction.colloectedBy') // Use the correct column name
                  ->where('users.adminID', '=', Auth::user()->adminID)
                  ->whereIn('transaction.transactionType', ['Collection', 'New Loan']); // Explicitly specify table

    if ($fromDate && $toDate) {
        $return->whereBetween('transaction.date', [$fromDate, $toDate]);
    }

    return $return->orderBy('transaction.id', 'asc')->paginate(20);
}




// public static function getTransaction($fromDate = null, $toDate = null, $request = null)
// {
//     $return = self::select('transaction.*', 'users.name as collected_by_name')
//                   ->join('users', 'users.id', '=', 'transaction.colloectedBy')
//                   ->where('adminID','=' , Auth::user()->adminID)
//                   ->whereIn('transactionType', ['Collection', 'New Loan']);

    

//     if ($fromDate && $toDate) {
//         $return->whereBetween('date', [$fromDate, $toDate]);
//     }

//     return $return->orderBy('id', 'asc')->paginate(20);
// }


public static function getUserTotalCollection()
{
    $todayDate = Carbon::today()->format('Y-m-d');
    $currentUserId = auth()->id();

    $totalCollection = self::whereDate('date', $todayDate)
        ->where('colloectedBy', $currentUserId)
        ->where('adminID','=' , Auth::user()->adminID)
        ->sum('receiveAmount');

    return $totalCollection;
}


public static function getUserTotalDistribution()  {

    $todayDate = Carbon::today()->format('Y-m-d');
    $currentUserId = auth()->id();
    $totalDistribution = self::whereDate('date', $todayDate)
        ->where('colloectedBy', $currentUserId)
        ->where('adminID','=' , Auth::user()->adminID)
        ->sum('payingAmount'); 

    return $totalDistribution;

    
}


    
}
