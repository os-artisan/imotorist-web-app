<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class OtherVehicleClassTableSeeder.
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
                'vehicle_class_id'          => 1,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 2,
                'other_vehicle_class_id'    => 1,
            ],
            [
                'vehicle_class_id'          => 2,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 3,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 4,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 5,
                'other_vehicle_class_id'    => 4,
            ],
            [
                'vehicle_class_id'          => 5,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 6,
                'other_vehicle_class_id'    => 5,
            ],
            [
                'vehicle_class_id'          => 6,
                'other_vehicle_class_id'    => 4,
            ],
            [
                'vehicle_class_id'          => 6,
                'other_vehicle_class_id'    => 13,
            ],
            [
                'vehicle_class_id'          => 6,
                'other_vehicle_class_id'    => 12,
            ],
            [
                'vehicle_class_id'          => 6,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 6,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 5,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 4,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 3,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 12,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 7,
                'other_vehicle_class_id'    => 13,
            ],
            [
                'vehicle_class_id'          => 8,
                'other_vehicle_class_id'    => 5,
            ],
            [
                'vehicle_class_id'          => 8,
                'other_vehicle_class_id'    => 4,
            ],
            [
                'vehicle_class_id'          => 8,
                'other_vehicle_class_id'    => 3,
            ],
            [
                'vehicle_class_id'          => 8,
                'other_vehicle_class_id'    => 12,
            ],
            [
                'vehicle_class_id'          => 8,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 8,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 6,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 5,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 4,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 3,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 12,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 9,
                'other_vehicle_class_id'    => 13,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 9,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 8,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 6,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 5,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 7,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 4,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 3,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 12,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 10,
                'other_vehicle_class_id'    => 13,
            ],
            [
                'vehicle_class_id'          => 12,
                'other_vehicle_class_id'    => 11,
            ],
            [
                'vehicle_class_id'          => 13,
                'other_vehicle_class_id'    => 11,
            ],
        ];

        DB::table(config('license.other_vehicle_classes_table'))->insert($vehicle_classes);

        $this->enableForeignKeys();
    }
}
