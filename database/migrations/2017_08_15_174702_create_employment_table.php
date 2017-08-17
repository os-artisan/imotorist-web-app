<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('police.employables_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officer_id')->unsigned();
            $table->foreign('officer_id')->references('id')->on(config('access.officers_table'))->onDelete('cascade');
            $table->morphs('employable');
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
        Schema::dropIfExists(config('police.employables_table'));
    }
}
