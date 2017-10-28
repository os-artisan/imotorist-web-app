<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class CourtTableSeeder.
 */
class CourtTableSeeder extends Seeder
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
        $this->truncate(config('police.courts_table'));

        $courts = [
            [
                'name'              => 'Nugegoda',
            ],
            [
                'name'              => 'Homagama',
            ],
        ];

        DB::table(config('police.courts_table'))->insert($courts);

        $this->enableForeignKeys();
    }
}
