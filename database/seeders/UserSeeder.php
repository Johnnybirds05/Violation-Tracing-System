<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
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
                'qr_ref' => 'AA1234',
                'username' => 'jan',
                'lname' => 'CAGADAS',
                'fname' => 'JOHN MICHAEL',
                'mname' => '',
                'suffix' => '',
                'sex' => 'MALE',
                'bdate' => '2001-06-12',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'jan@dev.com',
                'mobile_no' => '1234567878',
                'driver_license_no' => 'K09-12-1345679',
                'expr_date' => '2025-06-12',
                'role' => 'DRIVER',
                'password' => Hash::make('a')
            ],

        ];

        \App\Models\User::insertOrIgnore($data);
    }
}
