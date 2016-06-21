<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	foreach (range(1,35) as $index) {
	        Customer::create([
	            'name' => $faker->name,
	            'contact_phone' => $faker->phoneNumber,
	            'email' => $faker->email,
	            'city' => $faker->city,
	            'zip' => $faker->postcode
	        ]);
        }
    }
}
