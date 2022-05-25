<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);
        UserProfile::create([
            'first_name'=>'Yasir',
            'last_name' =>'Rehman',
            'address' => 'St no 4 House no 32 F-10 Islamabad',
            'city' =>'Islamabad',
            'state'=>'Capital',
            'phone_no'=>'839-920-2902',
            'user_id'=>$user->id,
            'picture'=>'user.jpg',
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
