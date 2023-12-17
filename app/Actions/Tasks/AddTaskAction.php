<?php

namespace App\Actions\Tasks;

use App\DTOs\TaskDTO;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class AddTaskAction
{
    public function __construct()
    {
    }

    public function execute(TaskDTO $taskDTO)
    {
        Gate::authorize('create', Task::class);
        return Task::create($taskDTO->toArray());
    }
}
