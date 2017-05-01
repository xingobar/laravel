<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<meta name="csrf-token" content="<?php echo csrf_token() ?>">
	<link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript" src="/semantic/semantic.min.js"></script>
    <script type="text/javascript" src="/js/sweetalert.min.js"></script>
    @yield('staticFile')
</head>
<body style="background-color: #eee">
	<div class="ui inverted segment header-nav" style="margin-bottom: 0px;border-radius: 0px;">
		<div class="ui container">
			<div class="ui inverted secondary pointing menu">
				<a href="/index/" class="item active">首頁</a>
				<a href="/about/" class="item">關於我們</a>
				<div class="ui inverted right menu">
					<a href="/shoppingList/" class="item">
						<i class="cart icon"></i>
						購物車
						<span id="dollar" style="padding-left:10px;color:#ffecb3">
							<i class="ui dollar icon" style="margin-right:0;"></i>
							<span>0</span>
							元
						</span>
					</a>
						@if($user)
							<span class="item" style="padding-right:0;">歡迎 xxx
							{{$user}}
							</span>
							<a href="/logout" class="item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="user icon"></i>登出</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                            </form>
						@else
							<a href="/login" class="item"><i class="user icon"></i>登入</a>
						@endif
				</div>
			</div>
		</div>
	</div>
	@yield('content')
</body>
</html>