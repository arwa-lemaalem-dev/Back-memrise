<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;

class TaskController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $tasks = Tasks::where('project_id', $request->project_id)->get();
        if ($tasks) {
            return response()->json([
                'status' => 200,
                'tasks' => $tasks,
            ]);
        }
        return response()->json([
            'status' => 404,
        ]);
    }

    public function create(CreateTaskRequest $request): JsonResponse
    {
        if ($request->project_id != null && $request->title != null) {
            $project = Projects::where('id', $request->project_id)->first();
            if ($project) {
                $task = Tasks::create([
                    'name' => ucfirst($request->title),
                    'project_id' => $request->project_id,
                    'status' => 0,
                ]);
                if ($task) {
                    return response()->json([
                        'status' => 201,
                    ]);
                }
            }
        }
        return response()->json([
            'status' => 401,
            'message' => 'Unauthenticated'
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        if ($request->task_id) {
            $task = Tasks::where('id', $request->task_id)->delete();
            if ($task) {
                return response()->json([
                    'status' => 200,
                ]);
            }
        }
        return response()->json([
            'status' => 404,
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        if ($request->task_id) {
            $task = Tasks::where('id', $request->task_id)->first();
            if ($task) {
                if ($task->status == 0) {
                    $task->update([
                        'status' => 1
                    ]);
                } else {
                    $task->update([
                        'status' => 0
                    ]);
                }
                return response()->json([
                    'status' => 200,
                ]);
            }
        }
        return response()->json([
            'status' => 404,
        ]);
    }

    public function updateCurrentTask(Request $request): JsonResponse
    {
        $task = Tasks::where('id', $request->task_id)->first();
        if ($task) {
            Tasks::where('project_id', $task->project_id)->update([
                'current_task' => 0
            ]);
            $task->update([
                'current_task' => 1
            ]);
            return response()->json([
                'status' => 200,
            ]);
        }
        return response()->json([
            'status' => 404,
        ]);
    }
}
