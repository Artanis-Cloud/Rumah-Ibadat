<?php

namespace Database\Seeders;

use DB;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = date('Y-m-d H:i:s'); //get current date

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

                'created_at' => $current_date,
                'updated_at' => $current_date,
            ]
        );


        DB::table('peruntukans')->insert(
            [
                'total_fund' => '1000000',
                'current_fund' => '0.00',
                'balance_fund' => '1000000',


                'total_tokong' => '400000',
                'current_tokong' => '0.00',
                'balance_tokong' => '400000',

                'total_kuil' => '200000',
                'current_kuil' => '0.00',
                'balance_kuil' => '200000',

                'total_gurdwara' => '200000',
                'current_gurdwara' => '0.00',
                'balance_gurdwara' => '200000',

                'total_gereja' => '200000',
                'current_gereja' => '0.00',
                'balance_gereja' => '200000',

                'created_at' => $current_date,
                'updated_at' => $current_date,
            ]
        );

        // \App\Models\User::factory(20)
        // ->create();

        \App\Models\RumahIbadat::factory(20)
        ->create();
        // ->each(function () {
        //    \App\Models\RumahIbadat::factory()->create();
        // });

    }
}
