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
        Schema::create(config('license.motorist_vehicle_class_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('motorist_id')->unsigned();
            $table->foreign('motorist_id')->references('id')->on(config('access.motorists_table'))->onDelete('cascade');
            $table->integer('vehicle_class_id')->unsigned();
            $table->foreign('vehicle_class_id')->references('id')->on(config('license.vehicle_classes_table'))->onDelete('cascade');
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
        Schema::dropIfExists(config('license.motorist_vehicle_class_table'));
    }
}
