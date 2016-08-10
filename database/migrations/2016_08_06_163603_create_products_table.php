<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('product_id');
            $table->double('amount');
            $table->integer('category_id_fk')
                ->unsigned();
            $table->integer('unit_of_measurement_id_fk')
                ->unsigned();
            $table->string('name');
            $table->text('description')
                ->nullable();
            $table->boolean('is_prescription')
                ->default(false);
            $table->text('image_path')
                ->nullable();
            $table->decimal('price', 12, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id_fk')
                ->references('category_id')
                ->on('categories');
            $table->foreign('unit_of_measurement_id_fk', 'fk_uom')
                ->references('unit_of_measurement_id')
                ->on('unit_of_measurements');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
