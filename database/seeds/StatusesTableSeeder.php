<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		Status::create([
			'name' => 'New',
			'color' => 'danger'
		]);

		Status::create([
			'name' => 'Ready',
			'color' => 'success'
		]);

		Status::create([
			'name' => 'Parts Arrived',
			'color' => 'info'
		]);

		Status::create([
			'name' => 'Parts Ordered',
			'color' => 'info'
		]);

		Status::create([
			'name' => 'Closed',
			'color' => 'default'
		]);

		Status::create([
			'name' => 'Customer Contacted',
			'color' => 'warning'
		]);

		Status::create([
			'name' => 'Awaiting Pick Up',
			'color' => 'success'
		]);
		
		Status::create([
			'name' => 'Closed - No Sale',
			'color' => 'default'
		]);
	}
}
