@extends('layouts.app')

@section('title')
    <title>個人簡介</title>
@endsection


@section('static')
    <link rel='stylesheet' style="text/css" href="/css/profile.css"/>
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="profile-img" src="https://instagram.ftpe4-1.fna.fbcdn.net/t51.2885-19/s320x320/15875803_204646643273833_7500971403902976_a.jpg"/>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>{{Session::get('username')}}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>編輯個人檔案</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row" style="padding-top:20px;">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-md-6" style="padding-bottom:20px;">
                                <img width="100%" height="50%" src="{{url('/storage/uploads/')}}{{'/' . Session::get('username') . '/' }}{{$image->filename}}"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
@endsection