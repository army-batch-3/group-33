<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Role::create([
            'name' => 'Developer',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Super Administrator',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Administrator',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Regular User',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Operator',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Manager',
            'guard_name' => 'web'
        ]);
    }
}
