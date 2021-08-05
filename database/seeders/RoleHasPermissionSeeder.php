<?php

namespace Database\Seeders;

use App\Models\RoleHasPermission;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18];
        foreach($permissions as $item) {
            RoleHasPermission::create([
                'role_id' => 1,
                'permission_id' => $item,
            ]);
        }
    }
}
