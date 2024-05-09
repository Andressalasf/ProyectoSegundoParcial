<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=> $this->faker -> name,
            'identification_document'=> $this->faker -> numerify('#########'),
            'email'=> $this->faker -> email,
            'phone'=> $this->faker -> phoneNumber,
            'address'=> $this->faker -> address,
      
        ];
    }
}
