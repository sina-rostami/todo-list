@extends('task.task_layout')

@section('title', 'Tasks')

@section('in_head')
    <link href="{{ url('css/task.css') }}" rel="stylesheet" />
@endsection

@section('content')
@if (count($tasks) > 0)
    @foreach($tasks as $task)
        @if (!$task['is_done'])
            <div>
                <h3>Name: {{$task['title']}}</h3>
                <ul>
                    <li>
                        id: {{$task['id']}}
                    </li>
                    <li>
                        start_time: {{$task['start_time']}}
                    </li>
                    <li>
                        end_time: {{$task['end_time']}}
                    </li>
                    <li>
                        is_done: {{$task['is_done']}}
                    </li>
                    <form action="{{route('task.done', ['task' => $task['id']])}}", method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                        <button type="submit">Done</button>
                        </div>
                    </form>
                </ul>
            </div>
        @endif
    @endforeach
    @foreach($tasks as $task)
        @if ($task['is_done'])
            <div>
                <h3>Name: {{$task['title']}}</h3>
                <ul>
                    <li>
                        id: {{$task['id']}}
                    </li>
                    <li>
                        start_time: {{$task['start_time']}}
                    </li>
                    <li>
                        end_time: {{$task['end_time']}}
                    </li>
                    <li>
                        is_done: {{$task['is_done']}}
                    </li>
                    <form action="{{route('task.edit', ['task' => $task['id']])}}", method="GET">
                        @csrf
                        @method('PUT')
                        <div>
                        <button type="submit">Edit</button>
                        </div>
                    </form>
                </ul>
            </div>
        @endif
    @endforeach
@else
    <h2>No tasks</h2>
@endif
@endsection