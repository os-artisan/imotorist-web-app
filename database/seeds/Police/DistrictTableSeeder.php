<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class DistrictTableSeeder.
 */
class DistrictTableSeeder extends Seeder
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
        $this->truncate(config('police.districts_table'));

        $districts = [
            [
                'division_id'       => 1,
                'name'              => 'district 1',
            ],
            [
                'division_id'       => 1,
                'name'              => 'district 2',
            ],
        ];

        DB::table(config('police.districts_table'))->insert($districts);

        $this->enableForeignKeys();
    }
}
