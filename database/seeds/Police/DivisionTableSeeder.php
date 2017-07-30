<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class DivisionTableSeeder.
 */
class DivisionTableSeeder extends Seeder
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
        $this->truncate(config('police.divisions_table'));

        $divisions = [
            [
                'range_id'      => 1,
                'name'          => 'division 1',
            ],
            [
                'range_id'      => 1,
                'name'          => 'division 2',
            ],
        ];

        DB::table(config('police.divisions_table'))->insert($divisions);

        $this->enableForeignKeys();
    }
}
