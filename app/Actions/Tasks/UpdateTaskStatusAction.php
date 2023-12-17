<?php

namespace App\Actions\Tasks;

use App\DTOs\TaskDTO;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class UpdateTaskStatusAction
{
    public function __construct()
    {
    }

    public function execute(Task $task, bool $status): Task
    {

        Gate::authorize('update', $task);
        $task->update([
            'done' => $status
        ]);

        return $task;
    }
}
