<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
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
        	'cell_number'	=> '09123456789',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('users')->insert(array(
            'branch_id_fk'  => null,
            'user_type'     => 2,
            'first_name'    => 'John Felix',
            'middle_name'   => 'Campos',
            'last_name'     => 'Lim',
            'date_of_birth' => '1996-08-02',
            'password'      => bcrypt('admin12345'),
            'cell_number'   => '09051537422',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));

        DB::table('users')->insert(array(
            'branch_id_fk'  => 1,
            'user_type'     => 1,
            'first_name'    => 'Arnob',
            'middle_name'   => 'Masangkay',
            'last_name'     => 'Ghosh',
            'date_of_birth' => '1996-08-02',
            'password'      => bcrypt('admin12345'),
            'cell_number'   => '09293310136',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ));
    }
}
