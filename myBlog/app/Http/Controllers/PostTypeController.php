<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Http\Requests\PostTypeRequest;
use App\PostsTypes;

class PostTypeController extends Controller
{
    private $postRepository;

    public function __construct($postRepository){
        $this->middleware('auth',['except'=>[
            'show'
        ]]);
        $this->postRepository = $postRepository;
    }

    public function show($type_id){
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
        return view('posttype.create');
    }

    public function store(PostTypeRequest $request){
        PostsTypes::create($request->only('type'))->create();
        return redirect()->route('post.index');
    }

    public function edit($id){
        $post_type = $this->postRepository->getSpecifiedPostType();
        return view('posttype.edit',['post_type'=>$post_type]);
    }

    public function update(PostTypeRequest $request,$id){
        $post_type = $this->postRepository->getSpecifiedPostType($id);
        $post_type->fill($request->only('type'));
        $post_type->save();
        return redirect()->route('post.index');
    }

    public function destroy($id){
        $post_type = $this->postRepository->getSpecifiedPostType($id);
        $post_type->post()->delete();
        $post_type->delete();
        return redirect()->route('post.index');
    }
}
