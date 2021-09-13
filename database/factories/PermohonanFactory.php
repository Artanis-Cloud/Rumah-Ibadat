<?php

namespace Database\Factories;

use App\Models\Permohonan;
use App\Models\RumahIbadat;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermohonanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permohonan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // public/dummy/dummy.jpg

        $rumah_ibadat = RumahIbadat::factory()->create();

        return [
            'reference_number' => $this->faker->unique()->numerify('############'),

            'rumah_ibadat_id' => $rumah_ibadat->id,

            'user_id' => $rumah_ibadat->user_id,

            // 'status' => $this->faker->randomElement(['1', '4']),
            'status' => '1',

            'application_letter' => 'public/img/dummy/dummy.jpg',
            'registration_certificate' => 'public/img/dummy/dummy.jpg',
            'account_statement' => 'public/img/dummy/dummy.jpg',

            'payment_method' => '1',
            'total_fund' => '0',
        ];
    }
}
