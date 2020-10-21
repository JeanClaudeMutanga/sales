<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('account_no')->nullable();
            $table->string('opportunity_no')->nullable();
            $table->string('track_id')->nullable();
            $table->string('clientName');
            $table->string('companyName')->nullable();
            $table->string('companyRegId')->nullable();
            $table->string('vat');
            $table->string('physicalAddress')->nullable();
            $table->string('postalAddress')->nullable();
            $table->string('billingAddress')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
