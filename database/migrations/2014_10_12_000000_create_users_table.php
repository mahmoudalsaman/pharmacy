<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('user_id');
            $table->integer('branch_id_fk')
                ->unsigned()
                ->nullable();
            $table->integer('user_type');   // 1 for admin/employee, 2 for customer
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('cell_number')
                ->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('branch_id_fk')
                ->references('branch_id')
                ->on('branches');
            $table->unique(array('user_id', 'branch_id_fk'));
            $table->unique(array('first_name', 'middle_name', 'last_name'), 'fk_users_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
