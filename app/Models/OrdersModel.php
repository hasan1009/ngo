<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    static public function getOrders(){

        $return= self::select('users.*')
        ->where('user_type' ,'=', 1)
        ->where('is_delete', '=', 0)
        ->where('adminID','=' , Auth::user()->adminID);
        if(!empty(Request::get('name'))){

            $return=$return->where('name', 'like','%'.Request::get('name').'%');

        }
        
        if(!empty(Request::get('mobile_number'))){

            $return=$return->where('mobile_number', 'like','%'.Request::get('mobile_number').'%');

        }

        if(!empty(Request::get('date'))){

            $return=$return->whereDate('created_at', '=',Request::get('date'));

        }
        $return=$return->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }
}
