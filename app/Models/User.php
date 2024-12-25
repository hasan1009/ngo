<?php

namespace App\Models;
use Auth;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Request;
use Cache;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getAdmin(){

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

    static public function getEmployee(){

        $return= self::select('users.*')
        ->where('users.user_type' ,'=', 2)
        ->where('users.is_delete', '=', 0)
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

      public function OnlineUser(){
        return Cache::has('OnlineUser'.$this->id);

     }

    static public function getTotalUser($user_type){
        return self::select('users.id')
                   ->where('user_type','=',$user_type)
                   ->where('is_delete','=',0)
                   ->where('adminID','=' , Auth::user()->adminID)
                   ->count();

    }


    static public function getEmployeeReports(){

        return self::select('users.*')
        ->where('users.user_type' ,'=', 2)
        ->where('users.is_delete', '=', 0)
        ->where('adminID','=' , Auth::user()->adminID)
        ->get();

        


    }

    public function getProfile() {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return url('upload/profile/' .$this->profile_pic);

        }else{
            return "";
        }
        
    }

    public function getProfileDirect() {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return url('upload/profile/' .$this->profile_pic);

        }else{
            return url('upload/profile/dummy_profile.webp');
        }
        
    }


   static public function getEmailSingle($email)  {

    return User::where('email','=', $email)->first();
    
   }

   static public function getTokenSingle($remember_token)  {

    return User::where('remember_token' , '=', $remember_token)->first();

    if(!empty($user)){

        $data['user']=$user;
        return view('auth.reset');


    }else{

        abort(404);
    }
    
   }


   

}
