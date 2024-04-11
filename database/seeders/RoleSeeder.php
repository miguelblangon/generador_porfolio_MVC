<?php

namespace Database\Seeders;

use Database\Seeders\Roles\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);

        $user = Role::create(['name' => 'User']);
        $permission_user= new UserRole();
        $user->givePermissionTo($permission_user->permission());

        //$permissions = Permission::pluck('id', 'id')->all();
        //$user->syncPermissions($permissions);
    }
}
