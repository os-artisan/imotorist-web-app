<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('access.users_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('other_names');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone', 15)->nullable()->unique();
            $table->boolean('verified')->default(config('access.users.verify_mobile') ? false : true);
            $table->string('address', 255)->nullable();
            $table->string('nic', 15)->nullable()->unique();
            $table->string('passport', 15)->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->rememberToken();
            $table->string('firebase_token')->nullable()->unique();
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
        Schema::dropIfExists(config('access.users_table'));
    }
}
