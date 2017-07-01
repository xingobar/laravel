<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PostRepository;
use App\Post;
use App\Http\Requests\PostRequest;

class BlogController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository){
        $this->middleware(['auth','admin'],[
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
        $comments = $this->postRepository->getSpecifiedComment($post->id);
        return view('post.show',[
            'post'=>$post,
            'comments'=>$comments
        ]);
    }

    public function edit($id){
        $post = $this->postRepository->getSpecifiedPost($id);
        $postTypes = $this->postRepository->getPostsTypesWithOrderByNameASC();
        return view('post.edit',[
            'post'=>$post,
            'post_types'=>$postTypes
        ]);
    }

    public function update(PostRequest $request,$id){
        $post = $this->postRepository->getSpecifiedPost($id);
        $post->fill($request->all());
        $post->save();
        return redirect()->route('post.index');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
