<?php

namespace App\Actions\Tasks;

use App\DTOs\TaskDTO;
use App\Models\Task;

class DeleteTaskAction
{
    public function __construct()
    {
    }

    public function execute(Task $task): bool
    {
        return $task->delete();
    }
}
