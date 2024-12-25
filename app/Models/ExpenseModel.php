<?php

namespace App\Models;
use HasFactory;
use Auth;
   
use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    protected $table = 'expense'; 

    static public function getSingle($id){
        return self::find($id);
    }

   static public function getExpanse($fromDate = null, $toDate = null){

    $return = self::select('expense.*')
    ->where('is_delete', '=', 0)
    ->where('adminID','=' , Auth::user()->adminID)
    ->orderBy('id', 'asc');

    if ($fromDate && $toDate) {
        $return->whereBetween('created_at', [$fromDate, $toDate]);
    }


    return $return->orderBy('id', 'asc')->paginate(20);

   }

  


}
