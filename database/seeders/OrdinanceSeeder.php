<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data = [
            [
                'ordinance_name' => 'Wearing of Slippers',
                'description' => 'Wearing of slippers while riding will violate the city ordinance code 1237 that states that all the driver must wear shoes!',
            ],
            [
                'ordinance_name' => 'Wearing of Helmet',
                'description' => 'Wearing of slippers while riding will violate the city ordinance code 1237 that states that all the driver must wear shoes!',
            ],
            [
                'ordinance_name' => 'No OR/CR',
                'description' => 'Wearing of slippers while riding will violate the city ordinance code 1237 that states that all the driver must wear shoes!',
            ],

        ];

        \App\Models\Vehicle::insertOrIgnore($data);

    }
}
