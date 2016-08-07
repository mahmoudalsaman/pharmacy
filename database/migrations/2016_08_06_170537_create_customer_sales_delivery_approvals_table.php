<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerSalesDeliveryApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_sales_delivery_approvals', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('customer_sales_delivery_approval_id');
            $table->integer('customer_sales_delivery_id_fk')
                ->unsigned();
            $table->integer('user_id_fk')
                ->unsigned();
            $table->string('status');
            $table->timestamps();

            $table->foreign('customer_sales_delivery_id_fk', 'fk_delivery')
                ->references('customer_sales_delivery_id')
                ->on('customer_sales_deliveries');
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
        Schema::drop('customer_sales_delivery_approvals');
    }
}
