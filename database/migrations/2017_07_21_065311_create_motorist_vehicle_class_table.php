<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotoristVehicleClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorist_vehicle_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('motorist_id')->unsigned();
            $table->foreign('motorist_id')->references('id')->on('motorists')->onDelete('cascade');
            $table->integer('vehicle_class_id')->unsigned();
            $table->foreign('vehicle_class_id')->references('id')->on('vehicle_classes')->onDelete('cascade');
            $table->date('issued_date');
            $table->date('expiry_date');
            $table->string('restrictions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motorist_vehicle_class');
    }
}
