<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PixcanvaRepository;
use Log;
use Storage;
use Session;
class PixcanvaController extends Controller
{
    
    // @var pixcanva repository
    protected $pixcanva; 

    public function __construct(PixcanvaRepository $pixcanva)
    {
    	$this->middleware('auth');
    	$this->pixcanva = $pixcanva;
    }

    public function index(Request $request)
    {
        Session::put('username',$request->user()->name);
        Session::put('user_id',$request->user()->id);
        return view('index',[
            'post' => $this->pixcanva->forUser($request->user()), /// post counts
            'comments'=>$this->pixcanva->getComment(),
        ]);
    }
    public function posts(Request $request)
    {
        return view('add_posts');
    }
    public function addPosts(Request $request)
    {
        
        if($request->file('image') !=null)
        {
            $path = '/public/uploads/' . $request->user()->name;
            $filepath = $path . '/' . (string)($request->file('image'));
            $filename = strtolower($request->file('image')->getClientOriginalName());
            $extension = strtolower($request->file('image')->getClientOriginalExtension());
            Log::info("path : " . $path);
            Log::info("extension : " . $extension);
            if(!file_exists($path))
            {
                Storage::makeDirectory($path);
                Log::info('Directory created successfully');
            }
            Log::info("filename : " . $filename);
            // https://laravel.tw/docs/5.3/filesystem
            // Storage::putFileAs parameter 
            // @param1: destination directory
            // @param2: file
            // @param3 : manually a specify file name
            Storage::putFileAs($path . '/',$request->file('image'),$filename);
            Log::info('image upload success');
            $message = $request->input('message');
            $this->pixcanva->addPosts($request->user(),$message,$filename);
            return redirect('/index');
        }
    }
    public function comments(Request $request)
    {
        $post_id = $request->input('post_id');
        $comments = $request->input('comments');
        $this->pixcanva->comment($request->user(),$comments,$post_id);
        return redirect('/index');
    }

    public function deletePosts(Request $request)
    {
        if((int)$request->user()->id !== (int)$request->input('user_id')) return json_encode('error');
        $this->pixcanva->deletePosts($request->user(),$request->input('post_id'));
        return json_encode("success");
    }

    public function profile(Request $request)
    {
        // get all of the posted image 
        $images = $this->pixcanva->getImage($request->user());
        return view('profile',[
            'images'=>$images,
        ]);
    }

    public function likePosts(Request $request)
    {
        // like function
        
    }

    public function uploadAvatar(Request $request)
    {
        // user avatar upload function
        $path = '/public/avatar' . $request->uesr()->name ;
        $filename = strtolower($request->file('image')->getClientOriginalName());
        if(!file_exists($path)){
            Storage::makeDirectory($path);
            Log::info("make Directory success");
        }
        Storage::putAsFile($path . '/' , $request->file('image'),$filename);
        Log::info('image avatar upload successfully');
        return json_encode('success');
    }

    public function searchFriend()
    {
        // search friend algorithm
    }

    public function followUser()
    {
        // follow user function
    }

}
