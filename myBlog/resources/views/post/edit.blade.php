@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    標題:{{$post->title}}
                </div>
                <div class="pnael-body">
                    <div class="container-fluid">
                        <form class="form-horizontal" method="post" action="{{route('post.update',['post'=>$post->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">標題</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-md-2 control-label">分類</label>
                                <div class="col-md-10">
                                    <select name="type" class="form-control">
                                        @foreach($post_types as $post_type)
                                            <option value="{{$post_type->id}}" {{ ($post->type == $post_type->type)? "selected='selected'" :""  }}>{{$post_type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-md-2 control-label">內容</label>
                                <div class="col-md-10">
                                    <textarea style="resize:vertical;" cols="80" rows="10" name="content" >
                                        {{$post->content}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-default">儲存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection