@extends('layouts.app')

@section('title')
    <title>新增文章</title>
@endsection

@section('static')
    <link rel="stylesheet" style="text/css" href="/css/posts.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="{{ url('add_posts') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="image">照片</label>
                    <input type="file" class="form-control"  id="image" name="image"/>
                </div>
                <div class="form-group">
                    <label for="message">訊息:</label>
                    <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                </div>
                <div class="row text-center">
                    <button type="submit" class="submit btn btn-default">提交</button>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection