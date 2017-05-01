<!DOCTYPE html>
<html>
<head>
    <title>登入</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript" src="/semantic/semantic.min.js"></script>
</head>
<body style="background-color: #eee;">
    <div class="ui vertical strip quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="ui center aligned row">
                <div class="column ui segment form-wrapper">
                    <form class="ui large form" method="POST" action="{{route('login')}}">
                        {{csrf_field()}}
                        <div class="field">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <div class="ui left icon input">
                                <i class="ui user icon"></i>
                                <input type="email" name="email" placeholder="請輸入電子郵件" required>
                            </div>
                        </div>
                        <div class="field">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{$errors->first('password')}}</strong>
                                </span>
                            @endif
                            <div class="ui left icon input">
                                <i class="ui lock icon"></i>
                                <input type="password" name="password" placeholder="請輸入密碼">
                            </div>
                        </div>
                        <button type="submit" class="ui fluid large teal submit button">登入</button>
                    </form>
                </div>
                <div class="column right-segment">
                    <div class="ui vertical buttons">
                        <div class="ui big blue left labeled button icon" id="register">
                            註冊
                            <i class="ui lock icon"></i>
                        </div>
                        <div class="ui big left labeled icon facebook button ">
                            Facebook
                            <i class="ui facebook icon"></i>
                        </div>
                        <div class="ui big left labeled icon google plus button">
                            Google
                            <i class="ui google icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
        $("#register").click(function(){
            document.location.href="/register";
            console.log('test');
        })
        </script>
</body>
</html>