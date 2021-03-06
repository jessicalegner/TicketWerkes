<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$tables = array(
			'users',
			'statuses',
            'customers'
        );

        foreach ($tables as $table){
			DB::table($table)->truncate();
		}
        // $this->call(UserTableSeeder::class);
        $this->call('UsersTableSeeder');
        $this->call('StatusesTableSeeder');
		$this->call('CustomersTableSeeder');
    }
}
