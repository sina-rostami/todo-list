@extends('login_layout')

@section('title', 'Login')

@section('content')
<form method="POST" action="">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
        <label for="floatingInput">Email Address</label>
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com"/>
    </div>
    <div class="form-floating">
        <label for="floatingPassword">Password</label>
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" />
    </div>
    <div class="form-floating">
        <a href="{{ url('signup') }}">Not a member? Register Now!</a>
    </div>
    <div class="form-floating">
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Sign in</button>
    </div>
</form>

@endsection