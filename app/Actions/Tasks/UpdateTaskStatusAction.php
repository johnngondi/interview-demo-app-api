<?php

namespace App\Actions\Tasks;

use App\DTOs\TaskDTO;
use App\Models\Task;

class UpdateTaskStatusAction
{
    public function __construct()
    {
    }

    public function execute(Task $task, bool $status): Task
    {
        $task->update([
            'done' => $status
        ]);

        return $task;
    }
}
