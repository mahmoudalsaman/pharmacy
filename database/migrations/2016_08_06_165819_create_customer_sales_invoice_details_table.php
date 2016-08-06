<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerSalesInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_sales_invoice_details', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('customer_sales_invoice_detail_id');
            $table->integer('customer_sales_invoice_id_fk')
                ->unsigned();
            $table->integer('product_id_fk')
                ->unsigned();
            $table->integer('quantity');

            $table->foreign('customer_sales_invoice_id_fk', 'fk_invoice')
                ->references('customer_sales_invoice_id')
                ->on('customer_sales_invoices');
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
        Schema::drop('customer_sales_invoice_details');
    }
}
