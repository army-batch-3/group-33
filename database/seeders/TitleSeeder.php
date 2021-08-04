<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Title::create([
            'Title'=>'Personnel',
            'Description'=>'OG1',
            'PayLevel'=>'1',
            'first_half_month'=>'10000',
            'second_half_month'=>'10000',
            'allowance'=>'0',
            'Daily_rate'=>'0',
            'Hourly_rate'=>'0',
            'Minute_rate'=>'0',
            'Month_rate'=>'0',
            'Class'=>'Fixed'
        ]);

        Title::create([
            'Title'=>'Developer',
            'Description'=>'ISDC',
            'PayLevel'=>'1',
            'first_half_month'=>'10000',
            'second_half_month'=>'10000',
            'allowance'=>'0',
            'Daily_rate'=>'0',
            'Hourly_rate'=>'0',
            'Minute_rate'=>'0',
            'Month_rate'=>'0',
            'Class'=>'Fixed'
        ]);
    }
}
