<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_owner', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('owner_id');

            /**Foreign keys */
            //$table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            //$table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_owner');
    }
}
