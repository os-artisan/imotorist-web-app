<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('access.officers_table'), function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->foreign('id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
            $table->string('badge_no', 6)->unique();
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::table(config('access.officers_table'), function (Blueprint $table) {
            $table->dropForeign(config('access.officers_table').'_id_foreign');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists(config('access.officers_table'));
    }
}
