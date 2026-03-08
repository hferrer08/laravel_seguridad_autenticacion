<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndUsersSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'task.view',
            'task.create',
            'task.edit',
            'task.delete',
            'users.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);
        $userRole = Role::firstOrCreate(['name' => 'Usuario']);

        $adminRole->syncPermissions([
            'task.view',
            'task.create',
            'task.edit',
            'task.delete',
            'users.view',
        ]);

        $editorRole->syncPermissions([
            'task.view',
            'task.create',
            'task.edit',
            'task.delete',
        ]);

        $userRole->syncPermissions([
            'task.view',
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin123*'),
            ]
        );
        $admin->assignRole('Administrador');

        $editor = User::firstOrCreate(
            ['email' => 'editor@test.com'],
            [
                'name' => 'Editor',
                'password' => Hash::make('Editor123*'),
            ]
        );
        $editor->assignRole('Editor');

        $usuario = User::firstOrCreate(
            ['email' => 'usuario@test.com'],
            [
                'name' => 'Usuario',
                'password' => Hash::make('Usuario123*'),
            ]
        );
        $usuario->assignRole('Usuario');
    }
}
