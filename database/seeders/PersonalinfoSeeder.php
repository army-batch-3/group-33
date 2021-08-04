<?php

namespace Database\Seeders;

use App\Models\PersonalInfo;
use Illuminate\Database\Seeder;

class PersonalinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalInfo::create([
            'user_id' => '1',
            'email' => 'jan@yahoo.com',
            'given_name' => 'Jan Ray',
            'middle_name' => 'Lee',
            'last_name' => 'Nofe',
            'company' => 'Philippine Army',
            'job_title' => 1,
            'contact' => '09153254687',
            'country' => 'Philippines',
            'city' => 'Taguig City',
            'address' => 'Lt. Arellano',
            'active' => 1
        ]);

        PersonalInfo::create([
            'user_id' => '2',
            'email' => 'admin@yahoo.com',
            'given_name' => 'Admin',
            'middle_name' => 'System',
            'last_name' => 'Super',
            'company' => 'Philippine Army',
            'job_title' => 1,
            'contact' => '09153251598',
            'country' => 'Philippines',
            'city' => 'Taguig City',
            'address' => 'Lt. Arellano',
            'active' => 1
        ]);
        
    }
}
