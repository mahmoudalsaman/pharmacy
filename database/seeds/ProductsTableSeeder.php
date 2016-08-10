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
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Montelukast",
            'description'=> 'For allergies',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 2,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Montelukast",
            'description'=> 'For allergies',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 250,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 6,
            'name'=> "Amoxicillin Capsule",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 10,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Amoxicillin Drops 100 mg",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Amoxicillin Suspension 125 mg/5 mL",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Amoxicillin Suspension 250 mg/5 mL",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 3,
            'name'=> "Ampicillin Capsule",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 3,
            'name'=> "Azithromycin Tablet",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 3,
            'name'=> "Cefalexin Capsule",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 10,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Cefalexin Drops 100 mg/mL",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 10,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Cefalexin Drops 100 mg/mL",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 50,
            'category_id_fk'=> 1,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Cefuroxime Suspension 125 mg/5 mL",
            'description'=> 'Antibiotic',
            'is_prescription'=> 1,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


    }
}
