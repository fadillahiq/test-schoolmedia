<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'all menu']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $role2 = Role::create(['name' => 'siswa']);
        $permission2 = Permission::create(['name' => 'profil menu']);

        $role2->givePermissionTo($permission2);
        $permission2->assignRole($role2);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'muhamad.fadilahiq@gmail.com',
            'password' => bcrypt('Market22')
        ]);

        $admin->assignRole('admin');
    }
}
