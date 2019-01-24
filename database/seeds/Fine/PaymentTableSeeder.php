<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class PaymentTableSeeder.
 */
class PaymentTableSeeder extends Seeder
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
        $this->truncate(config('fine.payments_table'));

        $payments = [
            [
                'user_id' => 1,
                'token' => unique_random(config('fine.payments_table'), 'token', config('fine.payment_token.length')),
                'subtotal' => 500.00,
                'convenience' => 25.00,
                'total' => 525.00,
                'method' => 'Card',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table(config('fine.payments_table'))->insert($payments);

        $this->enableForeignKeys();
    }
}
