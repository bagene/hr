<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'address_line_1' => $this->faker->streetName(),
            'address_line_2' => $this->faker->streetAddress(),
            'address_city' => $this->faker->city(),
            'address_region' => $this->faker->state(),
            'address_country' => $this->faker->country(),
            'organization_size' => 50,
        ];
    }
}
