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
        DB::table('csms')->insert(
            [
                'intro_title' => 'Sistem Bantuan Kewangan Lima Agama (Buddha, Kristian, Hindu, Sikh, dan Tao) Selangor',
                'intro_content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.',

                'upen_address' => 'Pejabat Setiausaha Kerajaan Negeri Selangor, Seksyen Pihak Berkuasa Tempatan, UPEN, Tingkat 4, Bangunan SSAAS, 40503 Shah Alam, Selangor Darul Ehsan.',
                'upen_email' => 'adminlimas@selangor.gov.my',
                'upen_contact' => '03-55447098',

                'yb1_name' => 'Pejabat YB. Dato\' Teng Chang Khim',
                'yb1_address' => 'Tingkat 3, Bangunan SSAAS, 40503 Shah Alam, Selangor Darul Ehsan.',
                'yb1_email' => 'limas.selangor@gmail.com',
                'yb1_contact' => '03-55447310 / 03-55447585',

                'yb2_name' => 'Pejabat YB. Tuan Ganabatirau A/L Veraman',
                'yb2_address' => 'Tingkat 5, Bangunan SSAAS, 40503 Shah Alam, Selangor Darul Ehsan',
                'yb2_email' => 'staffexco2014@gmail.com',
                'yb2_contact' => '03-55447306 / 03-55447307',

                'yb3_name' => 'Pejabat YB. Tuan Hee Loy Sian',
                'yb3_address' => 'Tingkat 2, Bangunan SSAAS, 40503 Shah Alam, Selangor Darul Ehsan',
                'yb3_email' => 'pejabatexcoybhee@gmail.com',
                'yb3_contact' => '03-55447760 / 03-55212322',

                'yb4_name' => 'Pejabat YB 4',
                'yb4_address' => 'Alamat YB4, 40503 Shah Alam, Selangor.',
                'yb4_email' => 'yb4@selangor.gov.my',
                'yb4_contact' => '0123456789',
            ]
        );

        $current_date = date('Y-m-d H:i:s'); //get current date

        DB::table('batches')->insert(
            [
                'main_batch' => '5',

                'tokong_counter' => '0',
                'tokong' => '1',

                'kuil_counter' => '0',
                'kuil' => '2',

                'gurdwara_counter' => '0',
                'gurdwara' => '3',

                'gereja_counter' => '0',
                'gereja' => '4',

                'created_at' => $current_date,
                'updated_at' => $current_date,
            ]
        );


        // DB::table('peruntukans')->insert(
        //     [
        //         'total_fund' => '1000000',
        //         'current_fund' => '0.00',
        //         'balance_fund' => '1000000',


        //         'total_tokong' => '400000',
        //         'current_tokong' => '0.00',
        //         'balance_tokong' => '400000',

        //         'total_kuil' => '200000',
        //         'current_kuil' => '0.00',
        //         'balance_kuil' => '200000',

        //         'total_gurdwara' => '200000',
        //         'current_gurdwara' => '0.00',
        //         'balance_gurdwara' => '200000',

        //         'total_gereja' => '200000',
        //         'current_gereja' => '0.00',
        //         'balance_gereja' => '200000',

        //         'created_at' => $current_date,
        //         'updated_at' => $current_date,
        //     ]
        // );

        DB::table('peruntukans')->insert(
            [
                'total_fund' => '1',
                'current_fund' => '0.00',
                'balance_fund' => '1',


                'total_tokong' => '1',
                'current_tokong' => '0.00',
                'balance_tokong' => '1',

                'total_kuil' => '1',
                'current_kuil' => '0.00',
                'balance_kuil' => '1',

                'total_gurdwara' => '1',
                'current_gurdwara' => '0.00',
                'balance_gurdwara' => '1',

                'total_gereja' => '1',
                'current_gereja' => '0.00',
                'balance_gereja' => '1',

                'created_at' => $current_date,
                'updated_at' => $current_date,
            ]
        );

        $hashed_random_password = Hash::make("1234567890");

        // DB::table('users')->delete();
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

        // DB::table('users')->insert(
        //     [
        //         'id' => '2',
        //         'role' => '3',
        //         'status' => '1',
        //         'is_firstime' => '0',
        //         'is_rumah_ibadat' => '0',
        //         'name' => 'Mohammad Noorshahid bin Sharifudin',
        //         'email' => 'upen@selangor.gov.my',
        //         'ic_number' => '333333333333',
        //         'mobile_phone' => '0123456789',
        //         'password' => $hashed_random_password,
        //     ]
        // );

        // DB::table('users')->insert(
        //     [
        //         'id' => '3',
        //         'role' => '2',
        //         'status' => '1',
        //         'is_firstime' => '0',
        //         'is_rumah_ibadat' => '0',
        //         'name' => 'Muhd Luqman Nul Hakim Bin Abdul Hadi',
        //         'email' => 'yb@selangor.gov.my',
        //         'ic_number' => '222222222222',
        //         'mobile_phone' => '0123456789',
        //         'password' => $hashed_random_password,
        //     ]
        // );

        // DB::table('user_roles')->insert(
        //     [
        //         'user_id' => '3',

        //         'tokong' => '1',
        //         'kuil' => '0',
        //         'gurdwara' => '0',
        //         'gereja' => '0',
        //     ]
        // );

        // DB::table('users')->insert(
        //     [
        //         'id' => '4',
        //         'role' => '1',
        //         'status' => '1',
        //         'is_firstime' => '0',
        //         'is_rumah_ibadat' => '0',
        //         'name' => 'Mohd Hafiz Bin Ghiyatuddin',
        //         'email' => 'exco@selangor.gov.my',
        //         'ic_number' => '111111111111',
        //         'mobile_phone' => '0123456789',
        //         'password' => $hashed_random_password,
        //     ]
        // );

        // DB::table('user_roles')->insert(
        //     [
        //         'user_id' => '4',

        //         'tokong' => '1',
        //         'kuil' => '0',
        //         'gurdwara' => '0',
        //         'gereja' => '0',
        //     ]
        // );

        // \App\Models\User::factory(20)
        // ->create();

        // \App\Models\RumahIbadat::factory(50)
        // ->create();

        // \App\Models\Permohonan::factory(20)
        // ->create();

        // \App\Models\Tujuan::factory(200)
        // ->create();

        // \App\Models\Lampiran::factory(10)
        // ->create();

    }
}
