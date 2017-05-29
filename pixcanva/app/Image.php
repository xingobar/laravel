<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
class Image extends Model
{
    protected $fillable = ['filename','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
