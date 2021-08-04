<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reference::create([
            'user_id' => 1,
            'name' => 'None',
            'company' => 'none',
            'relationship' => 'none',
            'contact' => '1111111'
        ]);

        Reference::create([
            'user_id' => 2,
            'name' => 'None',
            'company' => 'none',
            'relationship' => 'none',
            'contact' => '1111111'
        ]);
    }
}
