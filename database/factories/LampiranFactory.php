<?php

namespace Database\Factories;

use App\Models\Lampiran;
use App\Models\Tujuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LampiranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lampiran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tujuan = Tujuan::factory()->create();

        if ($tujuan->tujuan == "AKTIVITI KEAGAMAAN") {
            return [
                'tujuan_id' => $tujuan->id,

                'file_type' => 'jpg',
                'url' => '/img/dummy/dummy.jpg',


                'description' => 'opt_1_photo',
            ];
        }else{
            return [
                'tujuan_id' => $tujuan->id,

                'file_type' => 'jpg',
                'url' => '/img/dummy/dummy.jpg',


                'description' => 'opt_2_file_1',
            ];
        }

    }
}
