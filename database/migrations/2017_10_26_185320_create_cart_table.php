<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('fine.carts_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on(config('fine.tickets_table'))->onDelete('cascade');
            $table->decimal('total', 8, 2)->nullable();
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
        Schema::table(config('fine.carts_table'), function (Blueprint $table) {
            $table->dropForeign(config('fine.carts_table').'_user_id_foreign');
            $table->dropForeign(config('fine.carts_table').'_ticket_id_foreign');
        });

        /*
         * Drop table
         */
        Schema::dropIfExists(config('fine.carts_table'));
    }
}
