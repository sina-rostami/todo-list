@extends('login_layout')

@section('title', 'Sign-Up')

@section('content')
<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Sign up</h1>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}" />
        @error('name')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
        @error('email')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
        @error('password')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="confitm-password">Confirm Password</label>
        <input type="password" class="form-control" id="confitm-password" name="confirm-password" placeholder="Password" />
        @error('confirm-password')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <a href="{{ url('login') }}">Already registered? Login</a>
    </div>
    <div class="form-group">
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign up</button>
    </div>
</form>

@endsection