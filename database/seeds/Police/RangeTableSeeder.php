<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class RangeTableSeeder.
 */
class RangeTableSeeder extends Seeder
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
        $this->truncate(config('police.ranges_table'));

        $ranges = [
            ['name' => 'Range 1'],
            ['name' => 'Range 2'],
            ['name' => 'Range 3'],
            ['name' => 'Range 4'],
            ['name' => 'Range 5'],
        ];

        DB::table(config('police.ranges_table'))->insert($ranges);

        $this->enableForeignKeys();
    }
}
