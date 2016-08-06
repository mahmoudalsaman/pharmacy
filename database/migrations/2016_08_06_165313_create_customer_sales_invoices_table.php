<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerSalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_sales_invoices', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('customer_sales_invoice_id');
            $table->integer('branch_id_fk')
                ->unsigned();
            $table->integer('user_id_fk')
                ->unsigned();
            $table->text('remarks')
                ->nullable();
            $table->decimal('amount_paid', 12, 2);
            $table->datetime('ordered_at');

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
        Schema::drop('customer_sales_invoices');
    }
}
