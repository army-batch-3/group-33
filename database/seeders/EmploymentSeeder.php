<?php

namespace Database\Seeders;

use App\Models\Employment;
use Illuminate\Database\Seeder;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employment::create([
            'user_id' => 1,
            'position' => 'Developer',
            'company' => 'Philippine Army',
            'reason' => 'N/A',
            'date_from' => '2021-02-01',
            'date_to' => '2021-02-01'

        ]);
        Employment::create([
            'user_id' => 2,
            'position' => 'Developer',
            'company' => 'Philippine Army',
            'reason' => 'N/A',
            'date_from' => '2021-02-01',
            'date_to' => '2021-02-01'

        ]);
    }
}
