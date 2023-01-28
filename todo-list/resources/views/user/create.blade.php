@extends('login_layout')

@section('title', 'Sign-Up')

@section('content')
<form method="POST" action="{{ route('user.store') }}">
    <h1 class="h3 mb-3 fw-normal">Sign up</h1>

    <div class="form-floating">
        <label for="floatingInput">Email Address</label>
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" />
    </div>
    <div class="form-floating">
        <label for="floatingPassword">Password</label>
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" />
    </div>
    <div class="form-floating">
        <label for="floatingPassword">Confirm Password</label>
        <input type="password" class="form-control" id="floatingPassword" name="confirm-password" placeholder="Password" />
    </div>
    <div class="form-floating">
        <a href="./login.html">Already registered? Login</a>
    </div>
    <div class="form-floating">
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign up</button>
    </div>
</form>

@endsection