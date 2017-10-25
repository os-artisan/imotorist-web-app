<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('fine.tickets_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_no', config('fine.ticket_no.length'));
            $table->integer('motorist_id')->unsigned();
            $table->foreign('motorist_id')->references('id')->on(config('access.motorists_table'))->onDelete('cascade');
            $table->integer('officer_id')->unsigned();
            $table->foreign('officer_id')->references('id')->on(config('access.officers_table'))->onDelete('cascade');
            $table->integer('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on(config('police.stations_table'))->onDelete('cascade');
            $table->integer('payment_id')->nullable()->unsigned();
            $table->foreign('payment_id')->references('id')->on(config('fine.payments_table'))->onDelete('cascade');
            $table->string('vehicle_no', 10);
            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();
            $table->string('location')->nullable();
            $table->date('court_date');
            $table->decimal('total_amount', 8, 2)->nullable();
            $table->boolean('paid')->default(false);
            $table->text('remarks')->nullable();
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
        /*
         * Remove Foreign/Unique/Index
         */
        Schema::table(config('fine.tickets_table'), function (Blueprint $table) {
            $table->dropForeign(config('fine.tickets_table').'_motorist_id_foreign');
            $table->dropForeign(config('fine.tickets_table').'_officer_id_foreign');
            $table->dropForeign(config('fine.tickets_table').'_station_id_foreign');
            $table->dropForeign(config('fine.tickets_table').'_payment_id_foreign');
        });

        /*
         * Drop table
         */
        Schema::dropIfExists(config('fine.tickets_table'));
    }
}
