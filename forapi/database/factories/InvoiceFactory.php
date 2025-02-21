<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Invoice;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     * @var string
     */

    protected $model = Invoice::class;
    /* 
     * @return array
     */


    public function definition()
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);
        /*
            randomElements() (plural) returns an array, while randomElement() (singular) 
            returns a single value.

            That's why your original code caused an array-to-string conversion error—because 
            $status was an array, but you were treating it like a string.
        */
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 20000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade() : NULL
        ];
    }
}
