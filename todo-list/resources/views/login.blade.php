@extends('login_layout')

@section('title', 'Login')

@section('content')
<form method="POST" action="{{ route('user.login') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"/>
    </div>
    <div class="form-floating">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
    </div>
    <div class="form-floating">
        <a href="{{ url('signup') }}">Not a member? Register Now!</a>
    </div>
    <div class="form-floating">
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Sign in</button>
    </div>
</form>

@endsection