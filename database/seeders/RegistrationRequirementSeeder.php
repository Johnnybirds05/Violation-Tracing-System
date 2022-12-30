<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationRequirementSeeder extends Seeder
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
                'name' => 'Barangay Clearance',
                'location' => 'Current Address',
                'cost' => 0
            ],
            [
                'name' => 'Insurance',
                'location' => 'LTO',
                'cost' => 750
            ],
            [
                'name' => 'Emission Test',
                'location' => 'LTO',
                'cost' => 500
            ],


        ];

        \App\Models\RegistrationRequirement::insertOrIgnore($data);
    }
}
