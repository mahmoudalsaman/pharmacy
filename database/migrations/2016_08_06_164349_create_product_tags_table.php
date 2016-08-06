<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tags', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('product_tag_id');
            $table->integer('product_id_fk')
                ->unsigned();
            $table->integer('tag_id_fk')
                ->unsigned();
            $table->timestamps();

            $table->foreign('product_id_fk')
                ->references('product_id')
                ->on('products');
            $table->foreign('tag_id_fk')
                ->references('tag_id')
                ->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_tags');
    }
}
