@extends('task.task_layout')

@section('title', 'Tasks')

@section('in_head')
    <link href="{{ url('css/task.css') }}" rel="stylesheet" />
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
@if (count($tasks) > 0)
    @foreach($tasks as $task)
        @if (!$task['is_done'])
            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$task['title']}}</h5>
                    <small class="text-muted">id: {{$task['id']}}</small>
                    </div>
                    <p class="mb-1">start_time: {{$task['start_time']}}</p>
                    <p class="mb-1">end_time: {{$task['end_time']}}</p>
                    <small class="text-muted">
                        <form action="{{route('task.done', ['task' => $task['id']])}}", method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <button type="submit">Done</button>
                            </div>
                        </form>
                    </small>
                </div>
            </div>
        @endif
    @endforeach
    @foreach($tasks as $task)
        @if ($task['is_done'])
            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><s>{{$task['title']}}</s></h5>
                    <small class="text-muted">id: {{$task['id']}}</small>
                    </div>
                    <p class="mb-1">start_time: {{$task['start_time']}}</p>
                    <p class="mb-1">end_time: {{$task['end_time']}}</p>
                    <small class="text-muted">
                        <form action="{{route('task.edit', ['task' => $task['id']])}}", method="GET">
                            @csrf
                            @method('PUT')
                            <div>
                                <button type="submit">Edit</button>
                            </div>
                        </form>
                    </small>
                </div>
            </div>
        @endif
    @endforeach

@else
    <h2>No tasks</h2>
@endif
@endsection