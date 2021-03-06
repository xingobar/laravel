@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增文章
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <form class="form-horizontal" method="post" action="{{route ('post.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">標題</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-md-2 control-label">分類</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="type">
                                        @foreach($post_types as $post_type)
                                            <option value="{{$post_type->id}}">{{$post_type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-md-2 control-label">內容</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="content" rows="25" cols="25" style="resize:vertical;">
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