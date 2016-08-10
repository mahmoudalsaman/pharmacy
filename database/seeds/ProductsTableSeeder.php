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
            'price' => 4.50,
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
            'price' => 3.50,
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
            'price' => 2.50,
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
            'price' => 12.50,
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
            'price' => 13.00,
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
            'price' => 5.50,
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
            'price' => 5.50,
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
            'price' => 2.50,
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
            'price' => 1.50,
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
            'price' => 3.50,
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
            'price' => 6.50,
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
            'price' => 7.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));
/////
        DB::table('products')->insert(array(            
            'amount'=> 100,
            'category_id_fk'=> 2,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Appetason Capsule",
            'description'=> 'An appetite enhancer',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 27,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Ambroxol Tablet",
            'description'=> 'Expectorant',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 15,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Carbocisteine Drops 50mg/mL",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Carbocisteine Syrup 100mg/5mL",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Carbocisteine Syrup 250mg/5mL",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 100,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Guaifenesin Capsule",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 17.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Lagundi Syrup",
            'description'=> 'Herbal medicine for cough',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 16.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 600,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Lagundi Tablet",
            'description'=> 'Herbal medicine for cough',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 15.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 100,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Salbutamol + Guaifenesin Capsule",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 7.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 30,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Salbutamol + Guaifenesin Syrup 150mg/5mL",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 6.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 30,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 6,
            'name'=> "Salbutamol Nebules (Aerovent)",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 8.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 30,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 6,
            'name'=> "Salbutamol Nebules (Hivent)",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 6.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 4,
            'category_id_fk'=> 3,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Salbutamol Tablet",
            'description'=> 'Mucolytic',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 3.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 4,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Ascorbic Acid Tablet",
            'description'=> 'Vitamin C for children',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 1.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 6,
            'category_id_fk'=> 4,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Bromhexine 4mg/5mL Syrup",
            'description'=> 'Mucolytic for children',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 45.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 200,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Ibuprofen Tablet",
            'description'=> 'Nonsteroidal anti-inflammatory drug',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 1.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 400,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Ibuprofen Tablet",
            'description'=> 'Nonsteroidal anti-inflammatory drug',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 3.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Mefenamic Acid Capsule",
            'description'=> 'Treatment of mild to moderate pain',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 2.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 250,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Mefenamic Acid Capsule",
            'description'=> 'Treatment of mild to moderate pain',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 1.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Naproxen Tablet",
            'description'=> 'Treatment of pain and inflammation',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 15,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Paracetamol Drops",
            'description'=> 'Pain reliever and fever reducer',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 65.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Paracetamol Syrup",
            'description'=> 'Pain reliever and fever reducer',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 75.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 500,
            'category_id_fk'=> 6,
            'unit_of_measurement_id_fk' => 5,
            'name'=> " Paracetamol Tablet",
            'description'=> 'Pain reliever and fever reducer',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 2.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Ascorbic Acid Syrup 100mg/mL",
            'description'=> 'Vitamin C in syrup form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 50.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 120,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Ascorbic Acid Syrup 100mg/mL",
            'description'=> 'Vitamin C in syrup form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 70.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 250,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Ascorbic Acid Syrup 100mg/mL",
            'description'=> 'Vitamin C in syrup form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 95.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 100,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Multivitamins + Iron Capsule",
            'description'=> 'Multivitamins in capsule form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 7.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 60,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Multivitamins + Minerals Syrup",
            'description'=> 'Multivitamins in syrup form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 55.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 250,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Multivitamins + Minerals Syrup",
            'description'=> 'Multivitamins in syrup form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 55.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 119,
            'category_id_fk'=> 7,
            'unit_of_measurement_id_fk' => 1,
            'name'=> "Multivitamins + Minerals Syrup",
            'description'=> 'Multivitamins in syrup form',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 7.50,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));


        DB::table('products')->insert(array(            
            'amount'=> 1,
            'category_id_fk'=> 8,
            'unit_of_measurement_id_fk' => 7,
            'name'=> "Oral Rehydration Salt",
            'description'=> 'A rehydration solution',
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 55.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 200,
            'category_id_fk'=> 9,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Alum./Mag./Hydro. Tablet (Antacid)",
            'description'=> "Treatment of heartburn, acid indigestion, and upset stomach",
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 10.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 100,
            'category_id_fk'=> 9,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Alum./Mag./Hydro. Tablet (Antacid)",
            'description'=> " ",
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 9.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));

        DB::table('products')->insert(array(            
            'amount'=> 250,
            'category_id_fk'=> 9,
            'unit_of_measurement_id_fk' => 5,
            'name'=> "Sambong Tablet",
            'description'=> " ",
            'is_prescription'=> 0,
            'image_path'    => null,
            'price' => 10.00,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ));



    }
}
