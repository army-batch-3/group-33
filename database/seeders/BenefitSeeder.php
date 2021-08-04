<?php

namespace Database\Seeders;

use App\Models\Benefits;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Benefits::create([
            'user_id' => 1,
            'sss' => '123',
            'philhealth' => '321',
            'pagibig' => '987',
            'savings' => '789',
            'tin' => '456'
        ]);

        Benefits::create([
            'user_id' => 2,
            'sss' => '123',
            'philhealth' => '321',
            'pagibig' => '987',
            'savings' => '789',
            'tin' => '456'
        ]);
    }
}
