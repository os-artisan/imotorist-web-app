<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('fine.offences_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('description_si');
            $table->decimal('fine', 8, 2);
            $table->integer('dip')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('fine.offences_table'));
    }
}
