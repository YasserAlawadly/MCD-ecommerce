<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::table('roles')->delete();
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'supervisor']);
        $role3 = Role::create(['name' => 'customer']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $admin = \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin',
        ]);
        $admin->assignRole($role1);

        $supervisor = \App\Models\User::factory()->create([
            'first_name' => 'Supervisor',
            'last_name' => 'User',
            'username' => 'supervisor',
        ]);
        $supervisor->assignRole($role2);

        for ($i = 0 ; $i <10 ; $i++){
            $customer = \App\Models\User::factory()->create();
            $customer->assignRole($role3);
        }
    }
}
