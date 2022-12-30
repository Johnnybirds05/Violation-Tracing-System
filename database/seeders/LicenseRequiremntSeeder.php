<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseRequiremntSeeder extends Seeder
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
                'name' => 'PSA Birth Certificate',
                'location' => 'Gaisano Ozamis City',
                'cost' => 0
            ],
            [
                'name' => 'Driving School',
                'location' => 'LTO',
                'cost' => 2000
            ],
            [
                'name' => 'Emission Test',
                'location' => 'LTO',
                'cost' => 500
            ],


        ];

        \App\Models\LicenseRequirement::insertOrIgnore($data);
    }
}
