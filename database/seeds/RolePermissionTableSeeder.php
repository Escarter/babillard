<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions

        // create roles and assign created permissions
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'internal-user']);
        Role::create(['name' => 'exteranl-user']);
        Role::create(['name' => 'admin-staff']);
        Role::create(['name' => 'prof']);
        Role::create(['name' => 'admin']);
    }
}
