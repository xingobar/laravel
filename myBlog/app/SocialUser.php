<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    protected $table = 'social_users';

    protected $fillable = [
        'user_id',
        'provider_user_id',
        'provider'
    ];

    public function user(){
        $this->belongsTo(User::class,'user_id','id');
    }
}
