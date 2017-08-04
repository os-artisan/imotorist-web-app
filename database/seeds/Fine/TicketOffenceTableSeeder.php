<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class TicketOffenceTableSeeder.
 */
class TicketOffenceTableSeeder extends Seeder
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
        $this->truncate(config('fine.ticket_offence_table'));

        $ticketOffence = [
            [
                'ticket_id'             => 1,
                'offence_id'            => 1,
            ],
        ];

        DB::table(config('fine.ticket_offence_table'))->insert($ticketOffence);

        $this->enableForeignKeys();
    }
}
