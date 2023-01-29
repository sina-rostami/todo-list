@extends('login_layout')

@section('title', 'Edit')

@section('content')
<form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
    @csrf
    @method('PUT')
    <h1 class="h3 mb-3 fw-normal">Edit</h1>

    <div class="form-floating">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" value="{{ $user['name'] }}" />
        @error('name')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" />
        @error('email')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
        @error('password')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
        <label for="confitm-password">Confirm Password</label>
        <input type="password" class="form-control" id="confitm-password" name="confirm-password" placeholder="Password" />
        @error('confirm-password')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update</button>
    </div>
</form>

@endsection