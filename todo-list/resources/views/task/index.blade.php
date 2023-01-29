@extends('task.task_layout')

@section('title', 'Tasks')

@section('in_head')
    <link href="{{ url('css/task.css') }}" rel="stylesheet" />
@endsection

@section('content')
@if (count($tasks) > 0)
    @foreach($tasks as $task)
    <div class="list-group">
  
    
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">
        @if ($task['is_done'])
        <s>{{$task['title']}}</s>
        @else
            {{$task['title']}}
        @endif  
        
        </h5>
      <small class="text-muted">id: {{$task['id']}}</small>
    </div>
    <p class="mb-1">start_time: {{$task['start_time']}}</p>
    <p class="mb-1">end_time: {{$task['end_time']}}</p>
    <small class="text-muted">
        @if ($task['is_done'])
            <form action="{{route('task.edit', ['task' => $task['id']])}}", method="GET">
                @csrf
                @method('PUT')
                <div>
                    <button type="submit">Edit</button>
                </div>
                </form>
                    @elseif (!$task['is_done'])
                    <form action="{{route('task.done', ['task' => $task['id']])}}", method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <button type="submit">Done</button>
                        </div>
                    </form>
        @endif

    </small>
  </a>
</div>
    @endforeach
@else
    <h2>No tasks</h2>
@endif
@endsection