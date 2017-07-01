<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostTypeRequest;
use App\Repository\PostRepository;
use App\PostsTypes;

class PostTypeController extends Controller
{
    private $postRepository;

    public function __construct(){
        $this->middleware(['auth','admin'],['except'=>[
            'show'
        ]]);
    }

    public function show($type_id){
        $this->postRepository = new PostRepository();
        $type = $this->postRepository->getSpecifiedPostType($type_id);
        $posts = $this->postRepository->getSpecifiedPostWithType($type_id);
        $postTypes = $this->postRepository->getPostsTypesWithOrderByNameASC();
        return view('post.index',[
            'type'=>$type,
            'post_types'=>$postTypes,
            'posts'=>$posts
        ]);
    }

    public function create(){
        $this->postRepository = new PostRepository();
        return view('posttype.create');
    }

    public function store(PostTypeRequest $request){
        PostsTypes::create($request->only('type'))->create();
        return redirect()->route('post.index');
    }

    public function edit($id){
        $this->postRepository = new PostRepository();
        $post_type = $this->postRepository->getSpecifiedPostType($id);
        return view('posttype.edit',['post_type'=>$post_type]);
    }

    public function update(PostTypeRequest $request,$id){
        $this->postRepository = new PostRepository();
        $post_type = $this->postRepository->getSpecifiedPostType($id);
        $post_type->fill($request->only('type'));
        $post_type->save();
        return redirect()->route('post.index');
    }

    public function destroy($id){
        $this->postRepository = new PostRepository();
        $post_type = $this->postRepository->getSpecifiedPostType($id);
        $post_type->post()->delete();
        $post_type->delete();
        return redirect()->route('post.index');
    }
}
