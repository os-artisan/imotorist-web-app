<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherVehicleClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_vehicle_classes', function (Blueprint $table) {
            $table->integer('vehicle_class_id')->unsigned();
            $table->foreign('vehicle_class_id')->references('id')->on('vehicle_classes')->onDelete('cascade');
            $table->integer('other_vehicle_class_id')->unsigned();
            $table->foreign('other_vehicle_class_id')->references('id')->on('vehicle_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_vehicle_classes');
    }
}
