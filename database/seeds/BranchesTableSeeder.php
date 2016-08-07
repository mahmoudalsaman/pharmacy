<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert(array(
        	'name' 		=> 'Zapote Branch',
        	'address'	=> 'Saan to?'
        ));
    }
}
