<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	
      	 DB::table('products')->insert(array(        	
        	'amount'=> 10,
        	'category_id_fk'=> 1,
        	'unit_of_measurement_id_fk'	=> 5,
        	'name'=> 'Cetirizine Tablet',
        	'description'=> 'For allergies',
        	'is_prescription'=> 0,
        	'image_path'	=> null,
        	'price'	=> 6.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));   


        DB::table('products')->insert(array(        	
        	'amount'=> 50,
        	'category_id_fk'=> 1,
        	'unit_of_measurement_id_fk'	=> 1,
        	'name'=> 'Diphenydramine Capsule',
        	'description'=> 'For allergies',
        	'is_prescription'=> 0,
        	'image_path'	=> null,
        	'price'	=> 75.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        )); 


        DB::table('products')->insert(array(        	
        	'amount'=> 60,
        	'category_id_fk'=> 1,
        	'unit_of_measurement_id_fk'	=> 5,
        	'name'=> "Diphenhydramine Syrup 12.5mg/5mL",
        	'description'=> 'For allergies',
        	'is_prescription'=> 0,
        	'image_path'	=> null,
        	'price'	=> 10.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(        	
        	'amount'=> 10,
        	'category_id_fk'=> 1,
        	'unit_of_measurement_id_fk'	=> 5,
        	'name'=> "Loratadine Tablet",
        	'description'=> 'For allergies',
        	'is_prescription'=> 0,
        	'image_path'	=> null,
        	'price'	=> 6.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(        	
        	'amount'=> 2,
        	'category_id_fk'=> 1,
        	'unit_of_measurement_id_fk'	=> 5,
        	'name'=> "Montelukast",
        	'description'=> 'For allergies',
        	'is_prescription'=> 0,
        	'image_path'	=> null,
        	'price'	=> 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

    }
}
