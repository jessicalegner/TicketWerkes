<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name' => 'Freeland',
			'email' => 'freeland@mrmoustachesphonerepair.com',
			'password' => bcrypt('phonerepair')
		]);
        
        User::create([
            'name' => 'Midland',
            'email' => 'midland@mrmoustachesphonerepair.com',
            'password' => bcrypt('phonerepair')
        ]);
    }
}