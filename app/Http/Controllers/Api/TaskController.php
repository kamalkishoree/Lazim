<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\task;
use App\Models\TodoTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 5);
        $task = TodoTask::orderBy("id", "desc")->paginate($per_page);
        $next_page = $task->nextPageUrl();
        return response()->json(['task' => $task, 'next_page_url' => $next_page], 200);
    }


    public function create(CreateTaskRequest $request)
    {

        $task = TodoTask::create(
            [
                'title' => $request->input('name'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ]
        );
        if ($task) {
            return response()->json(['message' => 'task saved Successfuly'], 200);
        } else {
            return response()->json(['error' => 'task not saved '], 0);
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $task = TodoTask::findOrFail($id);
            if ($task) {
                return response()->json(['message' => 'Success', 'task' => $task], 200);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Success', 'task' => 'no data found with this task id'], 200);
        }
    }


    public function edit(Request $request, $id)
    {
        $task_data = [];
        try {
            $task = TodoTask::findOrFail($id);
            if ($task) {

                if ($request->has('description')) {
                    $task_data['description'] = $request->description;
                }
                if ($request->has('title')) {
                    $task_data['title'] = $request->title;
                }
                if ($request->has('status')) {
                    $task_data['status'] = $request->status;
                }
                $update = $task->update($task_data);
                if ($update) {
                    return response()->json(['message' => 'task updated Successfuly'], 200);
                } else {
                    return response()->json(['message' => 'task has not been updated'], 400);
                }
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Success', 'task' => 'no data found with this task id'], 200);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $task = TodoTask::findOrFail($id);
            if ($task) {
                $task->delete();
                return response()->json(['message' => 'task deleted successfully'], 400);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Success', 'task' => 'no data found with this task id'], 200);
        }
    }
}
