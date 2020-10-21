<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inform_clients', function (Blueprint $table) {
            $table->id();
            $table->string('opportunity_id');
            $table->string('user_id');
            $table->string('expiry')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->index('user_id');
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
        Schema::dropIfExists('inform_clients');
    }
}
