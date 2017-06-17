<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PostRepository;
use App\Post;
use App\Requests\PostRequests;

class BlogController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository){
        $this->middleware('auth',[
            'except'=>['index','show'],
        ]);
        $this->postRepository = $postRepository;
    }

    public function index(){
        $posts = $this->postRepository->getPostWithOrderByCreatedTime();
        $postsTypes = $this->postRepository->getPostsTypesWithOrderByNameASC();
        return view('post.index',[
            'posts'=>$posts,
            'post_types'=>$postsTypes,
        ]);
    }

    public function create(){
        $postTypes = $this->postRepository->getPostsTypesWithOrderByNameASC();
        return view('post.create',['post_types'=>$postTypes]);
    }

    public function store(PostRequest $request){
        $post = new Post($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()->route('post.index');
    }

    public function show($id){
        $post = $this->postRepository->getSpecifiedPost($id);
        return view('post.show',[
            'post'=>$post,
        ]);
    }

    public function edit(){

    }

    public function update(){
        
    }

    public function destroy(){

    }
}
