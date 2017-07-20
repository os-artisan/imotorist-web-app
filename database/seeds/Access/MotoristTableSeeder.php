<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder.
 */
class MotoristTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.motorists_table'));

        //Add the motorist, user id of 5
        $motorists = [
            [
                'user_id'           => 5,
                'license_no'        => 'B400167',
                'issued_date'       => '2010-08-27',
                'expiry_date'       => '2018-08-27',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.motorists_table'))->insert($motorists);

        $this->enableForeignKeys();
    }
}
