<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_managers', function (Blueprint $table) {
            $table->id();
            $table->string('opportunity_id');
            $table->string('managerName')->nullable();
            $table->string('refNo')->nullable();
            $table->string('vettingSuccessful')->nullable();
            $table->string('depositRequired')->nullable();
            $table->string('comments')->nullable();
            $table->string('reason')->nullable();
            $table->string('approval')->nullable();
            $table->string('approvalMD')->nullable();
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
        Schema::dropIfExists('credit_managers');
    }
}
