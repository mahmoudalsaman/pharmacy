<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerSalesDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_sales_deliveries', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('customer_sales_delivery_id');
            $table->integer('customer_sales_invoice_id_fk')
                ->unsigned();
            $table->text('shipping_address');
            $table->string('status');

            $table->foreign('customer_sales_invoice_id_fk')
                ->references('customer_sales_invoice_id')
                ->on('customer_sales_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_sales_deliveries');
    }
}
