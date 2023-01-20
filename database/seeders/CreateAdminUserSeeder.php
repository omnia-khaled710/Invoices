<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Omnia khalid',
            'email' => 'Omniakhalid@gmail.com',
            'password' => bcrypt('12345678'),
            'roles_name'=>['owner'],
            'Status'=>'مفعل',
        ]);

        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::pluck('id','id')->all();

        $role->givePermissionTo($permissions);

        $user->assignRole([$role->id]);
    }
}
