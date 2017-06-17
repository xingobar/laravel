<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{action (HomeController@index)}}">Blog</a>
      <form class="navbar-form" action="{{action (HomeController@search)}}">
          <div class="form-group">
              <input type="text" class="form-control" name="search" placeholder="Search Article....">
          </div>
          <button type="submit" class="btn btn-info">Search</button>
      </form>
    </div>
    <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
        <li class="navbar-text">
            {{Auth::user()->name}}
        </li>
        <li>
            <a href="{{route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit">登出</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
            </form>
        </li>
      @else
        <li>
            <a href="{{action ('Auth\AuthController@showLoginForm)}}'">登入</a>
        </li>
      @endif
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
<div style="padding-top:70px;">
    
</div>