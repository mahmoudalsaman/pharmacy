<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UOMsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_of_measurements')->insert(array(
        	'name'	=> 'mL',
        	'abbreviation'	=> 'mL',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('unit_of_measurements')->insert(array(
        	'name'	=> 'kg',
        	'abbreviation'	=> 'kg',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('unit_of_measurements')->insert(array(
        	'name'	=> 'mg',
        	'abbreviation'	=> 'mg',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('unit_of_measurements')->insert(array(
        	'name'	=> 'repsules',
        	'abbreviation'	=> 'repsules',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('unit_of_measurements')->insert(array(
        	'name'	=> 'sachet',
        	'abbreviation'	=> 'sachet',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('unit_of_measurements')->insert(array(
        	'name'	=> 'box of 125 losenges',
        	'abbreviation'	=> 'box of 125 losenges',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('unit_of_measurements')->insert(array(
            'name'  => 'Capsule',
            'abbreviation'  => 'Capsule',    
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));
    }
}
