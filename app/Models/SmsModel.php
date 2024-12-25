<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class SmsModel extends Model
{
    protected $table = 'sms_package'; 

    static public function getSingle($id)

      {
        return self::find($id);
      }


      static public function getSmsPackages()  {

        $return = SmsModel::select('sms_package.*')
        ->where('is_delete','=',0)
        ->paginate(20);
        return $return;
        
      }
}
