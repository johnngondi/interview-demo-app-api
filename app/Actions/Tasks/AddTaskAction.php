<?php

namespace App\Actions\Tasks;

use App\DTOs\TaskDTO;
use App\Models\Task;

class AddTaskAction
{
    public function __construct()
    {
    }

    public function execute(TaskDTO $taskDTO)
    {
        return Task::create($taskDTO->toArray());
    }
}
