<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_carts', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('customer_cart_id');
            $table->integer('user_id_fk')
                ->unsigned();
            $table->timestamps();

            $table->foreign('user_id_fk')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_carts');
    }
}
