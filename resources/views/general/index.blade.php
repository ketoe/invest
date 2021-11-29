<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winop</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">  	
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/home.less') }}">  	
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="#">Strona Główna</a></li>
            <li><a href="/clients">Baza kontrahentów</a></li>
            <li><a href="/orders">Zlecenia</a></li>
            <li><a href="/monters">Montażyści</a></li>
            @if(Auth::user()->admin == 1)
                <li style="float: right; margin-right: 15px;"><a href="/admins" style="color: rgb(204, 44, 44); font-weight: bold">ADMIN</a></li>
            @endif
            @if(Auth::check())
            <li class="data_user">
                <a href="/logout"><div class="btn-logout"></div></a>
                {{-- <a href="/settings"><div class="btn-settings"></div></a> --}}
                {{ Auth::user()->name }} {{Auth::user()->surname}}
            </li>
            @endif
        </ul>
    </div>
    <div class="content">
        <ol class="breadcrumb"> @yield('title')</ol>
        <div class="text">
            @if(Session::has('success'))
                <div class="success alert alert-success" role="alert">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('error'))
                <div class="error alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>