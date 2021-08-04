<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jan Ray Nofe',
            'email' => 'jan@yahoo.com',
            'password' => 'nofe'
        ]);
    }
}
