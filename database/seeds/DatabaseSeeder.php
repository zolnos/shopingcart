<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('ProductsTableSeeder');
	}

}


class ProductsTableSeeder extends Seeder
{

	public function run()
	{

		\App\Product::create([
			'name' => 'Portfel'
		]);

		\App\Product::create([
			'name' => 'Zapalniczka'
		]);

		\App\Product::create([
			'name' => 'Wieloryb'
		]);

	}
}