<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitOfMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_of_measurements', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('unit_of_measurement_id');
            $table->string('name')
                ->unique();
            $table->string('abbreviation')
                ->unique();
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
        Schema::drop('unit_of_measurements');
    }
}
