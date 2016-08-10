<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
        	'name'	=> 'Allergies',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> 'Appetite Enhancer',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

		DB::table('categories')->insert(array(
        	'name'	=> 'Cough and Colds',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Children's Supplements",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Ear, Nose, Mouth, and Throat Preparations",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Fever and Pain Relief",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Multivitamins and Minerals",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Rehydration Solutions",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Renal Therapy",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Topical Products",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Women's Health",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Vitamins and Supplements",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Gout",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Blood Pressure and Heart Medication",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Anti-Infective Agents",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Vitamin C",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Joint and Muscle Pain",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Other RX Medicine",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

		DB::table('categories')->insert(array(
        	'name'	=> "Stomach and Intestinal Disorders",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Motion Sickness and Vertigo",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Food Supplement",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Diabetes Management",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Deworming Agents",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Other Vitamins/Minerals",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Cholesterol Management",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Asthma and Other Airway Diseases",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Eye Preparations",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('categories')->insert(array(
        	'name'	=> "Vitamin B Complex",    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));
    }
}
