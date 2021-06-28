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

        DB::table('batches')->insert(
            [

                'tokong_counter' => '0',
                'tokong' => '1',

                'kuil_counter' => '0',
                'kuil' => '1',

                'gurdwara_counter' => '0',
                'gurdwara' => '1',

                'gereja_counter' => '0',
                'gereja' => '1',
                
            ]
        );

        $current_date = date('Y-m-d H:i:s'); //get current date

        DB::table('peruntukans')->insert(
            [
                'total_fund' => '0.00',
                'current_fund' => '0.00',
                'balance_fund' => '0.00',


                'total_tokong' => '0.00',
                'current_tokong' => '0.00',
                'balance_tokong' => '0.00',

                'total_kuil' => '0.00',
                'current_kuil' => '0.00',
                'balance_kuil' => '0.00',

                'total_gurdwara' => '0.00',
                'current_gurdwara' => '0.00',
                'balance_gurdwara' => '0.00',

                'total_gereja' => '0.00',
                'current_gereja' => '0.00',
                'balance_gereja' => '0.00',

                'created_at' => $current_date,
                'updated_at' => $current_date,
            ]
        );

        $hashed_random_password = Hash::make("1234567890");

        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                'id' => '1',
                'role' => '4',
                'status' => '1',
                'is_firstime' => '0',
                'is_rumah_ibadat' => '0',
                'name' => 'Admin',
                'email' => 'admin@selangor.gov.my',
                'ic_number' => '444444444444',
                'mobile_phone' => '0123456789',
                'password' => $hashed_random_password,
            ]
        );

        DB::table('users')->insert(
            [
                'id' => '2',
                'role' => '3',
                'status' => '1',
                'is_firstime' => '0',
                'is_rumah_ibadat' => '0',
                'name' => 'Staff@Upen',
                'email' => 'upen@selangor.gov.my',
                'ic_number' => '333333333333',
                'mobile_phone' => '0123456789',
                'password' => $hashed_random_password,
            ]
        );

        DB::table('users')->insert(
            [
                'id' => '3',
                'role' => '2',
                'status' => '1',
                'is_firstime' => '0',
                'is_rumah_ibadat' => '0',
                'name' => 'YB',
                'email' => 'yb@selangor.gov.my',
                'ic_number' => '222222222222',
                'mobile_phone' => '0123456789',
                'password' => $hashed_random_password,
            ]
        );

        DB::table('user_roles')->insert(
            [
                'user_id' => '3',

                'tokong' => '1',
                'kuil' => '0',
                'gurdwara' => '0',
                'gereja' => '0',
            ]
        );

        DB::table('users')->insert(
            [
                'id' => '4',
                'role' => '1',
                'status' => '1',
                'is_firstime' => '0',
                'is_rumah_ibadat' => '0',
                'name' => 'Exco',
                'email' => 'exco@selangor.gov.my',
                'ic_number' => '111111111111',
                'mobile_phone' => '0123456789',
                'password' => $hashed_random_password,
            ]
        );

        DB::table('user_roles')->insert(
            [
                'user_id' => '4',

                'tokong' => '1',
                'kuil' => '0',
                'gurdwara' => '0',
                'gereja' => '0',
            ]
        );
        
    }
}