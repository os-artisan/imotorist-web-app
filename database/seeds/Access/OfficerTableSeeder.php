<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class OfficerTableSeeder.
 */
class OfficerTableSeeder extends Seeder
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
        $this->truncate(config('access.officers_table'));

        //Add the traffic police officer, user id of 4
        $officers = [
            [
                'user_id'        => 4,
                'badge_no'         => '50000',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.officers_table'))->insert($officers);

        $this->enableForeignKeys();
    }
}
