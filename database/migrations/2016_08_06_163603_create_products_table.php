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
            $table->string('name')
                ->unique();
            $table->text('description')
                ->nullable();
            $table->text('image_path')
                ->nullable();
            $table->decimal('price', 12, 2);
            $table->timestamps();
            $table->softDeletes();
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
