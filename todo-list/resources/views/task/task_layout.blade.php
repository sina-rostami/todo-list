<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('css/task.css') }}" rel="stylesheet" />
    <link href="{{ url('css/site.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
    @yield('in_head')
</head>
<body>
    <nav class="nav navbar  navbar-light bg-light" style="background-color:gray">
    <div class="nav-flex-main" id="navbarText">
        <span class="nav-flex">
        <div class="navbar-brand" style="margin-right: 30px;">To do list</div>
        <ul class="navbar-nav " style="margin-right:auto">
        <li class="nav-item active"style="display:flex; align-items:center">
            <a class="nav-link" href="{{ route('task.index') }}" style="margin-right: 10px;"><button class="btn btn-primary" >Tasks</button><span class="sr-only"></a>
            <a class="nav-link" href="{{ route('task.create') }}"><button class="btn btn-primary">New task</button><span class="sr-only"></a>
        </li>
        </ul>
        </span>
        <span class="navbar-text" style="display: flex">
            <a class="nav-link" href="{{ route('user.edit', ['request' => $request, 'user' => $request->session()->get('user_id')]) }}">Profile</a>
            <a href="{{ route('user.logout') }}" class="btn btn-primary">Logout</a>
        </span>
    </div>
    </nav>
    <div id="content" class="content">
        @yield('content')
    </div>
    @yield('message')
</body>
</html>