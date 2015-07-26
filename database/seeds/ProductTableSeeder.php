<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		DB::table('products')->truncate();

		$faker = Faker::create();

		foreach(range(1,50) as $i){
			Product::create([
				'name' => $faker->word(),
				'description' => $faker->text(),
				'price' => $faker->randomFloat(),
				'featured' => $faker->boolean(),
				'recommend' => $faker->boolean(),
			]);
		}
	}

}
