<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class MotoristTableSeeder.
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
                'license_no'        => 'B507614',
                'issued_date'       => '2011-06-21',
                'expiry_date'       => '2019-06-21',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.motorists_table'))->insert($motorists);

        $this->enableForeignKeys();
    }
}
