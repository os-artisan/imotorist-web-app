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
                'name'          => 'Northern',
            ],
            [
                'range_id'      => 1,
                'name'          => 'North Western',
            ],
            [
                'range_id'      => 4,
                'name'          => 'Western',
            ],
            [
                'range_id'      => 1,
                'name'          => 'North Central',
            ],
            [
                'range_id'      => 5,
                'name'          => 'Central',
            ],
            [
                'range_id'      => 5,
                'name'          => 'Sabaragamuwa',
            ],
            [
                'range_id'      => 2,
                'name'          => 'Eastern',
            ],
            [
                'range_id'      => 5,
                'name'          => 'Uva',
            ],
            [
                'range_id'      => 3,
                'name'          => 'Southern',
            ],
        ];

        DB::table(config('police.divisions_table'))->insert($divisions);

        $this->enableForeignKeys();
    }
}
