<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class TaskDTO extends ValidatedDTO
{
    protected function rules(): array
    {
        return [
            'title' => 'required|string:255',
            'user_id' => 'required|exists:users,id'
        ];
    }

    protected function defaults(): array
    {
        return [
            'done' => false
        ];
    }

    protected function casts(): array
    {
        return [];
    }
}
