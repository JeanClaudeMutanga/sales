<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCof2AdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cof2_admins', function (Blueprint $table) {
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
        Schema::dropIfExists('cof2_admins');
    }
}
