<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class PackageModel extends Model
{

   

    protected $table = 'package'; 

    static public function getSingle($id)

      {
        return self::find($id);
      }


      static public function getPackages()  {

        $return = PackageModel::select('package.*')
        ->where('is_delete','=',0)
        ->paginate(20);
        return $return;
        
      }
   


}
