<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('fine.payments_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
            $table->string('token', config('fine.payment_token.length'));
            $table->decimal('subtotal', 8, 2);
            $table->decimal('convenience', 8, 2);
            $table->decimal('total', 8, 2);
            $table->string('method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->tinyInteger('status')->default(0)->unsigned();
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
        Schema::table(config('fine.payments_table'), function (Blueprint $table) {
            $table->dropForeign(config('fine.payments_table').'_user_id_foreign');
        });

        /*
         * Drop table
         */
        Schema::dropIfExists(config('fine.payments_table'));
    }
}
