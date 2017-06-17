@extends('layouts.app')

@section('title')
所有文章
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>
                @if(Auth::check())
                    <div class="pull-right">
                        <a href="{{route('post.create')}}" class="btn btn-info">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>新增文章</span>
                        </a>
                    </div>
                    @if(isset($keyword))
                        搜尋 ： {{$keyword}}
                    @else
                        所有文章
                    @endif
                @endif
            </h4>
            <hr/>
            @if(count($posts) == 0)
                <p class="text-center">
                    沒有文章
                </p>
            @endif

            @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{$post->title}}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    @if($post->type !=null)
                                        <span class="badge">
                                            {{$post->types->type}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 text-right">
                                    {{$post->created_at->toDateString()}}
                                </div>
                            </div>
                            <hr style="margin:10px 0"/>
                            <div class="row">
                                <div class="col-md-12">
                                    {{$post->content}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    @if(Auth::check())
                                        <form method="post" action="{{route ('post.destroy',['post'=>$post->id])}}">
                                            <span style="padding-left:10px">
                                                <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-default">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                    <span style="padding-left:5px;">編輯文章</span>
                                                </a>
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span style="padding-left:5px;">刪除文章</span>
                                                </button>
                                            </span>
                                        </form>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route ('post.show',['post'=>$post->id])}}" class="pull-right">繼續閱讀...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
            <div class="col-md-8">
            @if(isset($keyword))
                {{$posts->appends(['keyword'=>$keyword])->render()}}
            @else
                {{$posts->render()}}
            @endif
        </div>
    </div>
</div>
@endsection