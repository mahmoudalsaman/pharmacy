<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProductInventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 1,
			'previous_value'=> 0,
			'current_value'=> 100,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 2,
			'previous_value'=> 0,
			'current_value'=> 200,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 3,
			'previous_value'=> 0,
			'current_value'=> 300,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 4,
			'previous_value'=> 0,
			'current_value'=> 400,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));


		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 5,
			'previous_value'=> 0,
			'current_value'=> 500,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

    }
}
