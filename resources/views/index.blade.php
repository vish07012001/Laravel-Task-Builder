@extends('layouts.app')



@section('title','List of stacks')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create')}}" class="link">Create Task </a>
</nav>


@isset($task)
@foreach($task as $t)
    <li> <a href="{{ route('tasks.show', ['id' =>  $t -> id ]) }}" @class(['line-through' => $t->completed])> {{ $t -> title }}</a>  </li>
@endforeach

<nav class="mt-4">
    {{ $task->links() }}
</nav>


@endisset


@endsection
