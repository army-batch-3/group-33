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
            'name'=>'Manage User',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Edit User',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Delete User',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Delete Employee',
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
        Permission::create([
            'name'=>'Assign Permission',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Add Permission',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Edit Permission',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Delete Permission',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Suppliers',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Transportation',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Warehouses',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Assets',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Employee',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Reports',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Fleet',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Restocks',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'Manage Requisitions',
            'guard_name'=>'web'
        ]);
    }
}
