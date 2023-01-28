<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="TODO list" />
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/"/>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('css/login.css') }}" rel="stylesheet" />
  </head>
  <body class="text-center" style="background-image: url({{ url('assets/background_login.png') }});">
    <main class="form-signin w-100">
        <div class="form-bg">
            @yield('content')
        </div>
    </main>
  </body>
</html>