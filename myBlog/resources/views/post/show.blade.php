@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
       <div class="row">
           <div class="page-header">
               <h1>
               {{$post->title}}
                    @if(Auth::check())
                        @if(Auth::user()->isAdmin())
                        <div class="pull-right">
                            <form method="post" action="{{route ('post.destroy',['post'=>$post->id])}}">
                                <span style="padding-left:10px;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-default">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span style="padding-left:5px">刪除文章</span>
                                    </button>
                                </span>
                            </form>
                        </div>
                        <div class="pull-right">
                            <a href="{{route ('post.edit',['post'=>$post->id])}}" class="btn btn-primary">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span style="padding-left:5px;">編輯文章</span>
                            </a>
                        </div>
                        @endif
                    @endif
                </h1>
                <div class="row" style="padding-bottom:10px">
                    <div class="col-md-6">
                        @if($post->types != null)
                            <span class="badge">{{$post->types->type}}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        {{$post->created_at}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{$post->content}}
                    </div>
                </div>
           </div>
           <div class="row">
               @foreach($comments as $comment)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                             <div class="col-md-8">
                                 {{$comment->author->name}}
                                 在 {{$comment->created_at}}說：
                             </div>
                             <div class="col-md-4">
                                 @if(Auth::check())
                                    @if(Auth::user()->id == $comment->user_id || Auth::user()->isAdmin())
                                        <form method="post" action="{{route ('post.comment.destroy',
                                        ['post'=>$post->id,
                                        'comment'=>$comment->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger pull-right">刪除回應</button>
                                        </form>
                                    @endif
                                 @endif
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{$comment->content}}
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
               <div class="row">
                   <div class="col-md-8 col-md-offset-2 text-center">
                       {{$comments->render()}}
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-10 col-md-offset-1">
                   @if(Auth::check())
                    <h3>發表回應</h3>
                    <form method="post" action="{{ route ('post.comment.store',['post'=>$post->id])}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>名稱</label>
                            <p>
                              {{Auth::user()->name}}
                            </p>
                        </div>
                        <label for="content">回應</label>
                        <div class="form-group">
                            <textarea style="resize:vertical" class="form-control" rows="5" name="content">
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">發表</button>
                    </form>
                    @else
                    <p class="text-center">
                        <a href="{{route('login')}}">
                        登入
                        </a>
                    </p>
                   @endif
               </div>
           </div>
       </div>
    </div>
</div>
@endsection