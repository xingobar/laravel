<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsTypes extends Model
{
    protected $table = 'posts_types';
    protected $fillable = [
        'type'
    ];

    public function post(){
        return $this->hasMany(Post::class,'type','id');
    }
    
}
