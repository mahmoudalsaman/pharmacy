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


		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 6,
			'previous_value'=> 0,
			'current_value'=> 600,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 7,
			'previous_value'=> 0,
			'current_value'=> 700,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 8,
			'previous_value'=> 0,
			'current_value'=> 800,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));


		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 9,
			'previous_value'=> 0,
			'current_value'=> 900,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 10,
			'previous_value'=> 0,
			'current_value'=> 900,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));
// 
		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 11,
			'previous_value'=> 0,
			'current_value'=> 800,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 12,
			'previous_value'=> 0,
			'current_value'=> 700,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 13,
			'previous_value'=> 0,
			'current_value'=> 500,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 14,
			'previous_value'=> 0,
			'current_value'=> 400,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 15,
			'previous_value'=> 0,
			'current_value'=> 300,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));

		DB::table('product_inventories')->insert(array(
			'branch_id_fk'=> 1,
			'user_id_fk'=> 1,
			'product_id_fk'	=> 16,
			'previous_value'=> 0,
			'current_value'=> 600,
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now()
		));


    }
}
