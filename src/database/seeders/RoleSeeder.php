<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Manager',
            'Staff',
        ];

        foreach ($roles as $role) {
            $role = Role::create(['name' => $role]);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
        }
    }
}
