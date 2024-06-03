<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/TodoTaskController.php
namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\TodoTask;
use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    public function index()
    {
        $tasks = TodoTask::all();
        return view('todo_tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tasks = TodoTask::all();
        return view('todo_tasks.create-task', compact('tasks'));
    }

    public function store(CreateTaskRequest $request)
    {
        TodoTask::create($request->all());
        return redirect()->route('todo-tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(TodoTask $todoTask)
    {
        return view('todo_tasks.show', compact('todoTask'));
    }

    public function edit(TodoTask $todoTask)
    {
        return view('todo_tasks.edit', compact('todoTask'));
    }

    public function update(CreateTaskRequest $request, TodoTask $todoTask)
    {
        $todoTask->update($request->all());

        return redirect()->route('todo-tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(TodoTask $todoTask)
    {
        $todoTask->delete();
        return redirect()->route('todo-tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function test()
    {
        return view('todo_tasks.test');
    }
}
