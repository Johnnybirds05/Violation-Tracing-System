<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VehicleSeeder extends Seeder
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
                'plate' => '2532KD',
                'model' => 'Honda',
                'body_type' => 'Motor',
                'serial' => 'abcaskdj1234',
                'color' => 'Red',
                'expiration' => '2022-08-10',
                'receipt_no' => '1000012341',
                'vehicle_img_path' => '',
                'is_verified' => 0,
            ],
            [
                'plate' => 'KBL546',
                'model' => 'Yamaha',
                'body_type' => 'Motor',
                'serial' => 'sadhdad55424a',
                'color' => 'Matte Black',
                'expiration' => '2023-08-10',
                'receipt_no' => '10000155642',
                'vehicle_img_path' => '',
                'is_verified' => 0,
            ],

            [
                'plate' => 'JHS564',
                'model' => 'Suzuki',
                'body_type' => 'Car',
                'serial' => '1234sdads21',
                'color' => 'Pink',
                'expiration' => '2023-10-11',
                'receipt_no' => '100021234512',
                'vehicle_img_path' => '',
                'is_verified' => 0,
            ],

        ];

        \App\Models\Vehicle::insertOrIgnore($data);
    }
}
