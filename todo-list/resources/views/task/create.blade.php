@extends('task.task_layout')

@section('title', 'Create Task')

@section('content')
<form method="POST" action="{{ route('task.store') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">New Task</h1>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="name" class="form-control" id="title" name="title" placeholder="Drink water" value="{{ old('title') }}"/>
        @error('title')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="start_time">Start</label>
        <input type="datetime-local" class="form-control" id="start_time" name="start_time" placeholder="Password" value="{{ old('start_time') }}"/>
        @error('start_time')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="end_time">End</label>
        <input type="datetime-local" class="form-control" id="end_time" name="end_time" placeholder="Password" value="{{ old('end_time') }}"/>
        @error('end_time')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Create</button>
    </div>
</form>
@endsection