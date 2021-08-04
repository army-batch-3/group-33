<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            TitleSeeder::class,
            PermissionSeeder::class,
            PersonalinfoSeeder::class,
            ModelHasRolesSeeder::class,
            EmploymentSeeder::class,
            ReferenceSeeder::class,
            BenefitSeeder::class
        ]);
    }
}
