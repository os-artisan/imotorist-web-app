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
        Schema::create(config('license.other_vehicle_classes_table'), function (Blueprint $table) {
            $table->integer('vehicle_class_id')->unsigned();
            $table->foreign('vehicle_class_id')->references('id')->on(config('license.vehicle_classes_table'))->onDelete('cascade');
            $table->integer('other_vehicle_class_id')->unsigned();
            $table->foreign('other_vehicle_class_id')->references('id')->on(config('license.vehicle_classes_table'))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Remove Foreign/Unique/Index
         */
        Schema::table(config('license.other_vehicle_classes_table'), function (Blueprint $table) {
            $table->dropForeign(config('license.other_vehicle_classes_table').'_vehicle_class_id_foreign');
            $table->dropForeign(config('license.other_vehicle_classes_table').'_other_vehicle_class_id_foreign');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists(config('license.other_vehicle_classes_table'));
    }
}
