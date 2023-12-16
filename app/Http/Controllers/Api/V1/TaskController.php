<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Tasks\AddTaskAction;
use App\Actions\Tasks\DeleteTaskAction;
use App\Actions\Tasks\UpdateTaskStatusAction;
use App\DTOs\TaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection(auth()->user()->tasks);
    }

    /**
     * Store a newly created resource in storage.
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function store(Request $request, AddTaskAction $addTaskAction): TaskResource
    {
        $taskDTO = TaskDTO::fromArray([
            'title' => $request->get('title'),
            'user_id' => auth()->id()
        ]);

        $task = $addTaskAction->execute($taskDTO);

        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(Request $request, Task $task, UpdateTaskStatusAction $updateTaskStatusAction): TaskResource
    {
        $this->validate($request, [
            'status' => 'required|boolean'
        ]);

        $newTask = $updateTaskStatusAction->execute($task, $request->boolean('status'));

        return new TaskResource($newTask);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, DeleteTaskAction $deleteTaskAction): JsonResponse
    {
        $deleteTaskAction->execute($task);

        return response()->json([
            'data' => null
        ]);
    }
}
