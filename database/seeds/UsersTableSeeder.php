<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        	'branch_id_fk'	=> 1,
        	'user_type'		=> 1,
        	'first_name'	=> 'Jerald John',
        	'middle_name'	=> 'Rifareal',
        	'last_name'		=> 'Pormon',
        	'date_of_birth'	=> '1996-08-02',
        	'password'		=> bcrypt('admin12345'),
        	'cell_number'	=> '09123456789'
        ));
    }
}
