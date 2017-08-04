<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class OffenceTableSeeder.
 */
class OffenceTableSeeder extends Seeder
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
        $this->truncate(config('fine.offences_table'));

        $offences = [
            [
                'description'       => 'Speeding',
                'fine'              => 500.00,
                'dip'               => 4,
            ],
        ];

        DB::table(config('fine.offences_table'))->insert($offences);

        $this->enableForeignKeys();
    }
}
