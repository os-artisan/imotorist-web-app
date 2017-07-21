<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class MotoristVehicleClassTableSeeder.
 */
class MotoristVehicleClassTableSeeder extends Seeder
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
        $this->truncate(config('license.motorist_vehicle_class_table'));

        $motorist_vehicle_class = [
            [
                'motorist_id'           => 1,
                'vehicle_class_id'      => 1,
                'issued_date'           => '2011-03-22',
                'expiry_date'           => '2019-03-22',
            ],
            [
                'motorist_id'           => 1,
                'vehicle_class_id'      => 2,
                'issued_date'           => '2011-03-22',
                'expiry_date'           => '2019-03-22',
            ],
            [
                'motorist_id'           => 1,
                'vehicle_class_id'      => 4,
                'issued_date'           => '2011-06-21',
                'expiry_date'           => '2019-06-21',
            ],
            [
                'motorist_id'           => 1,
                'vehicle_class_id'      => 11,
                'issued_date'           => '2011-06-21',
                'expiry_date'           => '2019-06-21',
            ],
        ];

        DB::table(config('license.motorist_vehicle_class_table'))->insert($motorist_vehicle_class);

        $this->enableForeignKeys();
    }
}
