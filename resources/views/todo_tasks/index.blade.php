@extends('layouts.auth', ['title' => 'Tasks'])
@section('content')

<div class="container">
    <h1>Todo Tasks</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('todo-tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @if($task->status == 1)
                    <a class="btn btn-primary">Active</a>
                    @elseif($task->status == 0)
                    <a class="btn btn-danger">Inactive</a>
                    @else
                    <a class="btn btn-secondary">Completed</a>
                    @endif
                </td>

                <td>
                    <a href="{{ route('todo-tasks.show', $task->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('todo-tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('todo-tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection