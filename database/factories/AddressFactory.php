<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'public_place' => $this->faker->streetName,
            'number' => $this->faker->numberBetween(10, 1000),
            'complement' => $this->faker->word,
            'zipcode' => $this->faker->numerify('#####-###'),
            'neighborhood' => $this->faker->firstName,
            'city_id' => 1,
        ];
    }
}
