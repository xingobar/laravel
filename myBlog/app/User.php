<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socail(){
        return $this->hasOne(SocialUser::class,'user_id','id');
    }

    public function isAdmin(){
        return ($this->type == 1);
    }

    public function getAvatarUrl(){
        if(empty($this->avatar)){
            return URL::asset('img/avatar/default.png');
        }else{
            if(!preg_match('/^[a-zA-Z]+:\/\//',$this->avatar)){
                return URL::asset($this->avatar);
            }
            return $this->avatar;
        }
    }

}
