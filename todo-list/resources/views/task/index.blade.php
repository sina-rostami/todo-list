@extends('task_layout')

@section('title', 'Tasks')

@section('content')

@if (count($tasks) > 0)
    @foreach($tasks as $task)
        <div>
            <h3>
                <a href="{{route('task.show', ['task' => $task['id']])}}">{{$task['title']}}</a>
            </h3>
            <ul>
                <li>
                    {{$task['start_time']}}
                </li>
                <li>
                    {{$task['end_time']}}
                </li>
                <li>
                    {{$task['is_done']}}
                </li>
            </ul>
        </div>
    @endforeach
@else
    <h2>No tasks</h2>
@endif


@endsection