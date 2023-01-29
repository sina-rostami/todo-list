@extends('task.task_layout')

@section('title', 'Edit Task')
@section('in_head')
    <link href="{{ url('css/edit.css') }}" rel="stylesheet" />
@endsection

@section('message')
<?php
if (isset($message))
{
    echo "<script>alert(\"" . $message . "\")</script>";
}
?>
@endsection

@section('content')
<form method="POST" action="{{ route('task.update', ['task' => $task->id]) }}">
    @csrf
    @method('PUT')
    <h1 class="h3 mb-3 fw-normal">Edit Task</h1>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="name" class="form-control" id="title" name="title" placeholder="Drink water" value="{{ $task['title'] }}"/>
        @error('title')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="start_time">Start</label>
        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $task['start_time'] }}"/>
        @error('start_time')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="end_time">End</label>
        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ $task['end_time'] }}"/>
        @error('end_time')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-check" style="margin-top:8px">
        <label for="is_done">Done</label>
        <input type="checkbox" class="form-check-input" id="is_done" name="is_done" <?php if ($task['is_done']) echo "checked" ?>/>
        @error('is_done')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update</button>
    </div>
</form>
@endsection