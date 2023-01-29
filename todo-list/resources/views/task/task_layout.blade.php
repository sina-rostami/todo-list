<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('in_head')
</head>
<body>
    <nav>
        <a href="{{ route('task.index') }}">Tasks</a>
        <a href="#">Edit Profile</a>
        <a href="#">Logout</a>
    </nav>
    <div id="content">
        @yield('content')
    </div>
</body>
</html>