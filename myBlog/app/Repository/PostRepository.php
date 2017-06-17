<?php

namespace App\Repository;

use App\Post;
use App\User;
use App\PostsTypes;
use Log;

class PostRepository
{
    public function getPostWithOrderByCreatedTime(){
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return $posts;
    }

    public function getPostsByKeyword($keyword){
        $posts = Post::where('title','like',$keyword)->orderBy('created_at','desc')->paginate(5);
        return $posts;
    }

    public function getPostsTypesWithOrderByNameASC(){
        $postsTypes = PostsTypes::orderBy('type','asc')->get();
        return $postsTypes;
    }

    public function getSpecifiedPost($id){
        $post = Post::findOrFail($id);
        return $post;
    }
}

?>