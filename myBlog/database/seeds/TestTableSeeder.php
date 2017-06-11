<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\PostsTypes;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();
        $postType = factory(PostsTypes::class,20)->create(); // 產生20筆假資料
        // 產生50筆假資料
        $posts  = factory(Post::class,50)->create()->each(function($post) use($user,$postType){
            $post->type  = $postType[rand(0,(count($postType)-1))]->id;
            $post->user_id = $user->id;
            $post->save();
        });
    }
}
