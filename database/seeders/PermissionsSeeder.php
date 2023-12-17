<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::create([
            'name' => 'create-tasks',
            'guard_name' => 'web'
        ]);

        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $role->givePermissionTo($permission);
    }
}
