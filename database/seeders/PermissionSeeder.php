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
        Permission::create([
            'name'=>'Dashboard List',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Employee',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Edit Employee',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Payroll Settings',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Roles - Permission',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Assign Roles',
            'guard_name'=>'web'
        ]);
    }
}
