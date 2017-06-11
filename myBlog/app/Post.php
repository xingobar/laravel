<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table ='posts';

    protected $fillable = [
        'title',
        'content',
        'type'
    ];

    public function auhtor(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function types(){
        return $this->hasOne(PostsTypes::class,'id','type');
    }
}
