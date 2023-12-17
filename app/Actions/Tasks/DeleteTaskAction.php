<?php

namespace App\Actions\Tasks;

use App\DTOs\TaskDTO;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class DeleteTaskAction
{
    public function __construct()
    {
    }

    public function execute(Task $task): bool
    {
        Gate::authorize('delete', $task);
        return $task->delete();
    }
}
