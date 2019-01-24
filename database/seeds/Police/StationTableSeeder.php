<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class StationTableSeeder.
 */
class StationTableSeeder extends Seeder
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
        $this->truncate(config('police.stations_table'));

        $stations = [
            [
                'district_id' => 9,
                'court_id' => 1,
                'name' => 'Maharagama',
            ],
            [
                'district_id' => 9,
                'court_id' => 2,
                'name' => 'Kottawa',
            ],
            [
                'district_id' => 9,
                'court_id' => 1,
                'name' => 'Mirihana',
            ],
        ];

        DB::table(config('police.stations_table'))->insert($stations);

        $this->enableForeignKeys();
    }
}
