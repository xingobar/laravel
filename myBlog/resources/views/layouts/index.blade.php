<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>    
        @include('shared.header')    
    </head>
    <body>
        @include('shared.nav')
        @yield('content')
    </body>
</html>