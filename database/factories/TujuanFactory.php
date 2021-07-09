<?php

namespace Database\Factories;

use App\Models\Permohonan;
use App\Models\Tujuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TujuanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tujuan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'permohonan_id' => Permohonan::factory()->create()->id,

            'tujuan' => $this->faker->randomElement(['AKTIVITI KEAGAMAAN', 'PENDIDIKAN KEAGAMAAN']),

        ];
    }
}
