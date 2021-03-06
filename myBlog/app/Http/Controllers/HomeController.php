<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Repository\PostRepository;


class HomeController extends Controller
{
    private $postRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->action('BlogController@index');
    }

    /**
    * Search the post 
    *
    * 
    */
    public function search(Request $request)
    {
        if(!$request->has('keyword')){
            return redirect()->back()->withErrors("do not input keyword");
        }
        $keyword  = $request->input('keyword');
        $posts = $this->postRepository->getPostsByKeyword($keyword);
        $postsTypes = $this->postRepository->getPostsTypesWithOrderByNameASC();
        return view('post.index', [
            'posts' =>$posts,
            'post_types'=>$postsTypes,
            'keyword'=>$keyword
        ]);
    }
}
