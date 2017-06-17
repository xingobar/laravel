@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
       <div class="row">
           <div class="page-header">
               <h1>
               {{$post->title}}
                    @if(Auth::check())
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
       </div>
    </div>
</div>
@endsection