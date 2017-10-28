<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class EmployablesTableSeeder.
 */
class EmployablesTableSeeder extends Seeder
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
        $this->truncate(config('police.employables_table'));

        $employables = [
            [
                'officer_id'        => 4,
                'employable_id'     => 1,
                'employable_type'   => 'station',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'officer_id'        => 7,
                'employable_id'     => 2,
                'employable_type'   => 'station',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'officer_id'        => 8,
                'employable_id'     => 3,
                'employable_type'   => 'station',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],            
        ];

        DB::table(config('police.employables_table'))->insert($employables);

        $this->enableForeignKeys();
    }
}
