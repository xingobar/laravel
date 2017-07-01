@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    更換頭像
                </div>
                <div class="panel-body">
                    <form method="post" action="{{action('UserController@postAvatar')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label >目前頭像</label>
                        <div class="row text-center">
                            <img src="{{Auth::user()->getAvatarUrl()}}" class="img-circle" style="max-height:150px;max-width:150px;" alt="">
                        </div>
                        <div class="form-group">
                            <label for="avatar">更換頭像</label>
                            <input type="file" id="avatar" name="avatar" accept="image/*" value="">
                            <p class="help-block">圖片檔 (jpeg, png, bmp, gif, svg)</p>
                        </div>
                        <div class="row text-center">
                            <button type="submit" class="btn btn-primary">儲存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection