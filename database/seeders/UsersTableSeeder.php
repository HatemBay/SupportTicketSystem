<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UsersTableSeeder extends Seeder
{
    //     Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit depts']);
        // $role = Role::findById(1);
        // $permission = Permission::findById(2);
        // $role->givePermissionTo($permission);
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'make departments']);
        // Permission::create(['name' => 'edit departments']);
        // Permission::create(['name' => 'delete departments']);
        // Permission::create(['name' => 'assign agents to departments']);

        // permissions for admin role
        // $adminRole = Role::findByName('admin');
        // $adminRole->givePermissionTo(Permission::findByName('make departments'));
        // $adminRole->givePermissionTo(Permission::findByName('edit departments'));
        // $adminRole->givePermissionTo(Permission::findByName('delete departments'));
        // $adminRole->givePermissionTo(Permission::findByName('assign agents to departments'));
        // $adminRole->givePermissionTo(Permission::where(contains('departments')));

        // $test = DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'john@doe.com',
        //     'password' => Hash::make('password')
        // ]);

        $admin = \App\Models\User::factory()->create([
            'name' => 'sss',
            'email' => 'sss@doe.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
            // factory default password is 'password'
        ]);

        // $admin->assignRole(Role::findByName('admin'));
    }
}
