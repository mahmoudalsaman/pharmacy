<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

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
        	'name'             => 'Zapote Branch',
        	'address'          => 'Zapote',
            'created_at'       => Carbon::now(),
            'updated_at'       => Carbon::now()
        ));
    }
}
