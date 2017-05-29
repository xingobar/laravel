<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;
use App\Image;
class Post extends Model
{
    protected $fillable = ['post_content'];
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
