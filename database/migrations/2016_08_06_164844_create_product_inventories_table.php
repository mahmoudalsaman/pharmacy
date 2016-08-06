<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inventories', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('product_inventory_id');
            $table->integer('branch_id_fk')
                ->unsigned();
            $table->integer('user_id_fk')
                ->unsigned();
            $table->integer('product_id_fk')
                ->unsigned();
            $table->integer('previous_value');
            $table->integer('current_value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('branch_id_fk')
                ->references('branch_id')
                ->on('branches');
            $table->foreign('user_id_fk')
                ->references('user_id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_inventories');
    }
}
