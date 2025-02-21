<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //execute the factories
        Customer::factory()
            ->count(10)
            ->hasInvoices(5)
            ->create();

        Customer::factory()
            ->count(7)
            ->hasInvoices(3)
            ->create();

        Customer::factory()
            ->count(6)
            ->create();
    }
}
