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

    public function getSpecifiedPostType($type_id){
        $post_type = PostsTypes::findOrFail($type_id);
        return $post_type;
    }

    public function getSpecifiedPostWithType($type_id){
        $posts = Post::where('type','=',$type_id)->orderBy('created_at','desc')->paginate();
        return $posts;
    }

    

}

?>