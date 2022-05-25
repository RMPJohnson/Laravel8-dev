<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'category-approved',

            'directory-list',
            'directory-create',
            'directory-edit',
            'directory-delete',
            'directory-approved'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
