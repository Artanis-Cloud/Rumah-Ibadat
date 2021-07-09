<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\RumahIbadat;
use Illuminate\Database\Eloquent\Factories\Factory;

class RumahIbadatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RumahIbadat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first = "Persatuan ";

        $last = $this->faker->numerify('####-####-####');

        $name_association = $first . $last;

        return [
            // 'user_id' => factory(App\User::class),
            'user_id' => User::factory()->create()->id,

            'verified' => '0',

            'category' => $this->faker->randomElement(['TOKONG', 'KUIL','GURDWARA','GEREJA']),
            'name_association' => $name_association,
            'office_phone' => $this->faker->numerify('##########'),

            'registration_type' => 'SENDIRI',
            'registration_number' => $this->faker->unique()->numerify('########'),

            'address' => $this->faker->address,
            'postcode' => $this->faker->numerify('#####'),
            'district' => 'PETALING',
            'state' => 'Selangor',
            'pbt_area' => 'MAJLIS BANDARAYA SHAH ALAM (MBSA)',

            'name_association_bank' => $name_association,
            'bank_name' => $this->faker->randomElement(['CIMB BANK', 'MAYBANK', 'RHB BANK', 'AFFIN BANK']),
            'bank_account' => $this->faker->numerify('####-####-####'),
        ];
        
    }
}
