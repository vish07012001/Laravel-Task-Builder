@extends('layouts.app')

@section('title', $task -> title)


@section('content')

<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link"><- Go back to the task list!</a>
</div>



<p class="mb-4 text-slate-700">{{ $task -> description }} </p>

@isset($task -> long_description)
<p class="mb-4 text-slate-700">{{ $task -> long_description}}</p>
@endisset

<p class="mb-4 text-sm text-slate-500">Created {{ $task -> created_at->diffForHumans()}} • Updated {{ $task -> updated_at->diffForHumans()}}</p>


<p class="mb-4">
    @if ($task->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not completed</span>
    @endif
</p>

<div class="flex gap-2">
    <a href="{{ route('tasks.edit',['id' => $task->id]) }}" class="btn">Edit Task</a>

    <form method='post' action="{{ route('tasks.toggle-complete',['id'=>$task->id]) }}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">Mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
    </form>

    <form method="post" action="{{route('tasks.destroy',['id'=>$task->id])}}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn">Delete Task</button>

    </form>
</div>
@endsection