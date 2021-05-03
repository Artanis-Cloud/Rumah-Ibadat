<?php

namespace Database\Seeders;

use DB;
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
        $hashed_random_password = Hash::make("1234567890");

        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                'role' => '4',
                'status' => '1',
                'is_firstime' => '0',
                'is_rumah_ibadat' => '1',
                'name' => 'Admin',
                'email' => 'admin@selangor.gov.my',
                'ic_number' => '000000000000',
                'mobile_phone' => '0123456789',
                'password' => $hashed_random_password,
            ]
        );
    }
}
