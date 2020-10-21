<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('opportunity_id');
            $table->string('servicesRequested')->nullable();
            $table->string('quoteSigned')->nullable();
            $table->string('quoteSigner')->nullable();
            $table->string('authorizedSigner')->nullable();
            $table->string('customerOrderForm')->nullable();
            $table->string('MRC')->nullable();
            $table->string('creditLimit')->nullable();
            $table->string('cycle')->nullable();
            $table->timestamps();

            $table->index('opportunity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
