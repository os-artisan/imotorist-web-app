<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class FineTableSeeder.
 */
class FineTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->call(OffenceTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(TicketOffenceTableSeeder::class);

        $this->enableForeignKeys();
    }
}
