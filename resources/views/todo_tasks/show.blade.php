@extends('layouts.auth', ['title' => 'View Todo Task'])

@section('content')
<div class="container">
  <h1>Todo Task Details</h1>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="form-group">
              <label for="title">Title:</label>
              <p>{{ $todoTask->title }}</p>
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <p>{{ $todoTask->description }}</p>
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <p>
                @if($todoTask->status == 1)
                <span class="badge badge-primary">Active</span>
                @elseif($todoTask->status == 0)
                <span class="badge badge-danger">In-Active</span>
                @else
                <span class="badge badge-secondary">Completed</span>
                @endif
              </p>
            </div>
            <a href="{{ route('todo-tasks.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('todo-tasks.edit', $todoTask->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('todo-tasks.destroy', $todoTask->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection