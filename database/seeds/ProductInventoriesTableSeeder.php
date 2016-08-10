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
        foreach (range(1, 50) as $index)
    	{

			DB::table('product_inventories')->insert(array(
				'branch_id_fk'=> 1,
				'user_id_fk'=> 1,
				'product_id_fk'	=> $index,
				'previous_value'=> 0,
				'current_value'=> 200,
				'created_at'=> Carbon::now(),
				'updated_at'=> Carbon::now()
			));

		}
    }
}
