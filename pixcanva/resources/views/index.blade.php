@extends('layouts.app')


@section('title')
    <title>首頁</title>
@endsection

@section('static')
  <link rel="stylesheet" type="text/css" href="/css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo csrf_token() ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">推薦用戶</div>
                        <div class="panel-body">朋友資料等</div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            
        </div>

        @for($i = 0 ; $i < count($post); $i++)
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="content-container">
                                        <img src="https://www.w3schools.com/bootstrap/newyork.jpg"/>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row username">
                                        test
                                    </div>
                                    <div class="row distinct">
                                        distinct
                                    </div>
                                </div>
                                <div class="col-md-2 text-right time">
                                    <?php 
                                        //http://stackoverflow.com/questions/1940338/date-difference-in-php-on-days
                                        //http://stackoverflow.com/questions/470617/how-to-get-the-current-date-and-time-in-php
                                            $now = new DateTime(date("Y-m-d"));
                                            $postCreatedDate = $post->get($i)->created_at;
                                            $postCreatedDate = new DateTime($postCreatedDate);
                                            $now = new DateTime($now->format("Y-m-d"));
                                            $postCreatedDate = new DateTime($postCreatedDate->format("Y-m-d"));
                                            $dDiff = $now->diff($postCreatedDate);
                                            //echo $dDiff->format('%R'); // use for point out relation: smaller/greater
                                            echo $dDiff->days .'天';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="thumbnail">
                                <img src="{{ url('/storage/uploads/')}}{{'/'.$post->get($i)->name . '/' . $post->get($i)->filename}}" width="100%" alt="{{$post->get($i)->filename}}"/>
                                <div class="caption">
                                    <section>
                                        <ul>
                                            <li>
                                                <a href="#" title="garyng">garyng</a>
                                                <span>{{$post->get($i)->post_content}}</span>
                                            </li>
                                             @foreach($comments as $comment)
                                                @if(($post->get($i)->id === $comment->post_id) and !(empty($comment->user_comment)))
                                                    <li>
                                                        <a href="#" title="{{$comment->name}}">{{$comment->name}}</a>
                                                        <span>{{$comment->user_comment}}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <section>
                                <div class="row">
                                    <div class="col-md-1">
                                        <a href="#">
                                            <span class="glyphicon glyphicon-heart" aria-hidden="true" ></span>
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <form action="{{ url('comments') }}" method="post" class="form comment">
                                            {{csrf_field()}}
                                            <input hidden name="username" value="{{Session::get('username')}}"/>
                                            <input hidden name="post_id" id="post_id" value="{{$post->get($i)->id}}"/>
                                            <input name="comments" id="comments" class="form-control" type="text" placeholder="留言......" onkeypress="return add_comment(event,this)"/>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span data-bind="label">更多選項</span>
                                            <span class="caret"></span>
                                        </button>
                                        @if(($post->get($i)->user_id) === Session::get('user_id'))
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a id="deletePosts" href="#">刪除文章</a></li>
                                                <input hidden name="post_id" value="{{$post->get($i)->id}}"/>
                                                <input hidden name="user_id" value="{{Session::get('user_id')}}"/>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        @endfor
    </div>
@endsection