<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketOffenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('fine.ticket_offence_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on(config('fine.tickets_table'))->onDelete('cascade');
            $table->integer('offence_id')->unsigned();
            $table->foreign('offence_id')->references('id')->on(config('fine.offences_table'))->onDelete('cascade');
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
        Schema::table(config('fine.ticket_offence_table'), function (Blueprint $table) {
            $table->dropForeign(config('fine.ticket_offence_table').'_ticket_id_foreign');
            $table->dropForeign(config('fine.ticket_offence_table').'_offence_id_foreign');
        });

        /*
         * Drop table
         */
        Schema::dropIfExists(config('fine.ticket_offence_table'));
    }
}
