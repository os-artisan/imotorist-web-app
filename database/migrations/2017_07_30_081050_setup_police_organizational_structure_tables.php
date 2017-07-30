<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupPoliceOrganizationalStructureTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('police.ranges_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create(config('police.divisions_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('range_id')->unsigned();
            $table->string('name');

            $table->foreign('range_id')
                ->references('id')
                ->on(config('police.ranges_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('police.districts_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned();
            $table->string('name');

            $table->foreign('division_id')
                ->references('id')
                ->on(config('police.divisions_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('police.police_stations_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id')->unsigned();
            $table->string('name');
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->softDeletes();

            $table->foreign('district_id')
                ->references('id')
                ->on(config('police.districts_table'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('police.police_stations_table'));
        Schema::dropIfExists(config('police.districts_table'));
        Schema::dropIfExists(config('police.divisions_table'));
        Schema::dropIfExists(config('police.ranges_table'));
    }
}
