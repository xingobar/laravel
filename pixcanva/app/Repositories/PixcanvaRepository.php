<?php
namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;
use Log;
use App\Post;
use App\Image;
class PixcanvaRepository
{
    public function forUser(User $user)
    {
        return DB::table('Posts')
            ->leftJoin('Images','Images.post_id','=','Posts.id')
            ->leftJoin('Users','Posts.user_id','=','Users.id')
            ->select('Posts.*','Images.filename','Users.name')
            // ->where('Users.id','=',$user->id)
            ->get();
    }
    public function addPosts(User $user,$message,$filename)
    {
        $posts = $user->post()->create([
            'post_content'=> $message,
        ]);
        $posts->image()->create([
            'filename'=> $filename,
            'user_id'=>$posts->user_id,
        ]);
    }
    public function deletePosts(User $user , $post_id)
    {
        $posts = Post::where('user_id','=',$user->id)
             ->where('id','=',$post_id)->first();
        $comments = $posts->comment()->delete();
        $images = $posts->image()->delete();
        $posts->delete();
        Log::info("the " . $post_id . " of " . $user->id . " delete successfully");
    }
    public function getImage(User $user)
    {
        return Image::where('user_id','=',$user->id)->get();
    }
    public function comment(User $user,$comments,$post_id)
    {
        $user->comment()->create([
            'post_id' => $post_id,
            'user_comment' => $comments,
        ]);
    }
    public function getFullData(User $user)
    {
        return (DB::table('Posts')
            ->join('Users','Users.id','=','Posts.user_id')
            ->leftJoin('Images','Images.post_id','=','Posts.id')
            ->leftJoin('Comments','Comments.post_id','=','Posts.id')
            ->select('Users.name','Comments.user_comment',
                    'Posts.post_content','Posts.id as post_id',
                    'Images.filename')
            // ->where('Users.id',$user->id)
            ->get());
    }
    public function getComment()
    {
        return (DB::table("Comments")
            ->leftJoin("Posts",'Posts.id','=','Comments.post_id')
            ->leftJoin('Users','Users.id','=','Comments.user_id')
            ->select('Users.name','Comments.user_comment','Posts.id as post_id')
            ->get());
    }
}
?>