<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class PoliceStationTableSeeder.
 */
class PoliceStationTableSeeder extends Seeder
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
        $this->truncate(config('police.police_stations_table'));

        $stations = [
            [
                'district_id'       => 1,
                'name'              => 'station 1',
            ],
            [
                'district_id'       => 1,
                'name'              => 'station 2',
            ],
        ];

        DB::table(config('police.police_stations_table'))->insert($stations);

        $this->enableForeignKeys();
    }
}
