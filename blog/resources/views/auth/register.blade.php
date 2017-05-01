@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
<link rel="stylesheet" type="text/css" href="/css/login.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script type="text/javascript" src="/semantic/semantic.min.js"></script>
<div class="ui ceneterd middle aligned grid">
    <div class="column">
        <form class="ui large form" id="register_form" method="post" action="{{route('register')}}">
            {{csrf_field()}}
            <div class="ui stacked segment">
                <div class="field">   
                    <div class="ui left icon input">
                        <input type="text" id="name" name="name" placeholder="請輸入使用者名稱">
                        <i class="ui user icon"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <input type="email" id="email" name="email" placeholder="請輸入電子郵件">
                        <i class="ui mail outline icon"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <input type="password" id="password" name="password" placeholder="請輸入密碼">
                        <i class="ui lock icon"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="請再次輸入密碼">
                        <i class="ui lock icon"></i>
                    </div>
                </div>
                <div class="ui column  grid">
                     <button class="ui column centered grid fluid large teal submit button" style="width:25%;" type="submit">註冊</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
