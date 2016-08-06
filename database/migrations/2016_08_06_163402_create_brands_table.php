<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('brand_id');
            $table->string('name')
                ->unique();
            $table->text('description')
                ->nullable();
            $table->text('image_path')
                ->nullable();
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
        Schema::drop('brands');
    }
}
