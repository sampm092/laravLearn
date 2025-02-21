<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Invoice;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     * @var string
     */

     protected $model = Customer::class;
    /** 
     * @return array
     */


    public function definition()
    {
        //untuk menambahkan dummy data secara langsung
        $type = $this->faker->randomElement(['I','B']);
        $name = $type == 'I' ? $this->faker->name() : $this->faker->company();
        return [
            'name' => $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postcode()
        ];
    }
}
