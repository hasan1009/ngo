<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SettingsModel extends Model
{
    use HasFactory;

    protected $table = 'settings'; 

    public static function getSingle()
    {
        return self::first() ?? new self();
    }

     public function getLogo() {
        if(!empty($this->logo) && file_exists('upload/settings/'.$this->logo)){
            return url('upload/settings/' .$this->logo);

        }else{
            return url("upload/settings/20241129125821dxnwia3seehdiq4aqgm4.jpeg");
        }
        
    }


    public function getFavicon() {
        if(!empty($this->favicon) && file_exists('upload/settings/'.$this->favicon)){
            return url('upload/settings/' .$this->favicon);

        }else{
            return url("upload/settings/20241129125821xc2kwh1luiutnpiys46x.jpg");
        }
        
    }


}
