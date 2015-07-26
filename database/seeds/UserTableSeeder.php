<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		DB::table('users')->truncate();

		$faker = Faker::create();

		User::create([
			'name' => 'Paulo Cordeiro Watakabe',
			'email' => 'watakabe05@gmail.com',
			'password' => Hash::make('123')
		]);

		foreach(range(1,15) as $i){
			User::create([
				'name' => $faker->name(),
				'email' => $faker->email(),
				'password' => Hash::make($faker->word)
			]);
		}
	}

}
