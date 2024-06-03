@extends('layouts.auth', ['title' => 'Edit Todo Task'])
@section('content')
<div class="container">
  <h1>Edit Todo Task</h1>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <form action="{{ route('todo-tasks.update', $todoTask->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title', $todoTask->title) }}" required>
                </div>
                <div class="col-sm-6">
                  <label for="description">Description:</label>
                  <textarea class="form-control" name="description">{{ old('description', $todoTask->description) }}</textarea>
                </div>

                <div class="col-sm-6">
                  <label for="status">Description:</label>
                  <select class="custom-select custom-select-lg mb-3" name="status">
                    <option selected disabled>select task status</option>
                    <option value="0" {{$todoTask->status == 0 ?'selected':''}}>InActive</option>
                    <option value="1" {{$todoTask->status == 1 ?'selected':''}}>Active</option>
                    <option value="2" {{$todoTask->status == 2 ?'selected':''}}>Completed</option>
                  </select>
                </div>

              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection