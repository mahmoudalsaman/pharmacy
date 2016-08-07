<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_cart_details', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('customer_cart_detail_id');
            $table->integer('customer_cart_id_fk')
                ->unsigned();
            $table->integer('product_id_fk')
                ->unsigned();
            $table->integer('quantity');

            $table->foreign('customer_cart_id_fk')
                ->references('customer_cart_id')
                ->on('customer_carts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('product_id_fk')
                ->references('product_id')
                ->on('products')
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
        Schema::drop('customer_cart_details');
    }
}
