<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleTableSeeder.
 */
class OtherVehicleClassTableSeeder extends Seeder
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
        $this->truncate(config('license.other_vehicle_classes_table'));

        $vehicle_classes = [
            [
                'vehicle_class'     => 1,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 2,
                'other_class'       => 1,
            ],
            [
                'vehicle_class'     => 2,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 3,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 4,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 5,
                'other_class'       => 4,
            ],
            [
                'vehicle_class'     => 5,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 6,
                'other_class'       => 5,
            ],
            [
                'vehicle_class'     => 6,
                'other_class'       => 4,
            ],
            [
                'vehicle_class'     => 6,
                'other_class'       => 13,
            ],
            [
                'vehicle_class'     => 6,
                'other_class'       => 12,
            ],
            [
                'vehicle_class'     => 6,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 6,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 5,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 4,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 3,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 12,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 7,
                'other_class'       => 13,
            ],
            [
                'vehicle_class'     => 8,
                'other_class'       => 5,
            ],
            [
                'vehicle_class'     => 8,
                'other_class'       => 4,
            ],
            [
                'vehicle_class'     => 8,
                'other_class'       => 3,
            ],
            [
                'vehicle_class'     => 8,
                'other_class'       => 12,
            ],
            [
                'vehicle_class'     => 8,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 8,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 6,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 5,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 4,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 3,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 12,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 9,
                'other_class'       => 13,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 9,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 8,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 6,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 5,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 7,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 4,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 3,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 12,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 10,
                'other_class'       => 13,
            ],
            [
                'vehicle_class'     => 12,
                'other_class'       => 11,
            ],
            [
                'vehicle_class'     => 13,
                'other_class'       => 11,
            ],
        ];

        DB::table(config('license.other_vehicle_classes_table'))->insert($vehicle_classes);

        $this->enableForeignKeys();
    }
}
