<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->ean8(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Male','Female']),
            'nickname' => '',
            'birthdate' => $this->faker->date(),
            'address_line' => $this->faker->address(),
            'address_city' => $this->faker->city(),
            'address_postcode' => $this->faker->postcode(),
            'address_province' => $this->faker->state(),
            'address_country' => $this->faker->country(),
            'telephone_number' => $this->faker->phoneNumber(),
            'mobile_number' => $this->faker->phoneNumber(),
        ];
    }
}
