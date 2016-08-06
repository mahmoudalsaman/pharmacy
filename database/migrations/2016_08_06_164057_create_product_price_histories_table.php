<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPriceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_price_histories', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('product_price_history_id');
            $table->integer('product_id_fk')
                ->unsigned();
            $table->decimal('price', 12, 2);
            $table->dateTime('created_at');

            $table->foreign('product_id_fk')
                ->references('product_id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_price_histories');
    }
}
