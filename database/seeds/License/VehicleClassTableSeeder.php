<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class VehicleClassTableSeeder.
 */
class VehicleClassTableSeeder extends Seeder
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
        $this->truncate(config('license.vehicle_classes_table'));

        $vehicle_classes = [
            [
                'class'         => 'A1',
                'description'   => 'Light motor cycles of which Engine Capacity does not exceeds 100CC',
            ],
            [
                'class'         => 'A',
                'description'   => 'Motorcycles of which Engine capacity exceeds 100CC',
            ],
            [
                'class'         => 'B1',
                'description'   => 'Motor Tricycle or van of which tare does not exceed 500kg and Gross vehicle weight does not exceed 1000 kg; Motor vehicle in this class include an invalid carriage',
            ],
            [
                'class'         => 'B',
                'description'   => 'Dual purpose Motor vehicle of which Gross Vehicle Weight does not exceed 3500kg and the seating capacity does not exceed 9 seats inclusive of the driver\'s seat, which may be combined with a trailer of which maximum authorized tare does not exceed 750kg; Motor vehicle in this class include an invalid carriage and all cars where the seating capacity does not exceed 9 seats inclusive of the Driver’s seat',
            ],
            [
                'class'         => 'C1',
                'description'   => 'Light Motor Lorry – Motor Lorry of which Gross Vehicle Weight exceeds 3500 kg and does not exceed 17000kg; Motor vehicles in this class may be combined with a trailer having maximum authorized tare which does not exceed 750kg, Motor vehicles of this class include a motor ambulance and motor hearses',
            ],
            [
                'class'         => 'C',
                'description'   => 'Motor Lorry of which Gross vehicle Weight is more than 17000kg, may be combine with a trailer having a maximum authorized tare which does not exceed 750kg',
            ],
            [
                'class'         => 'CE',
                'description'   => 'Heavy Motor Lorry – Combination of motor lorry and trailer(s) including articulated vehicles and its trailer(s) of which maximum authorized tare of the trailer exceeds 750kg and gross vehicle weight exceeds 3500kg',
            ],
            [
                'class'         => 'D1',
                'description'   => 'Light Motor Coach – Motor vehicles used for the carriage of persons and having seating capacity of not less than 9 seats and not more than 33 seats inclusive of the driver\'s seat; motor vehicle in this class may be combined with a trailer having a maximum authorized tare which does not exceed 750kg',
            ],
            [
                'class'         => 'D',
                'description'   => 'Motor Coach where the seating capacity does not exceed 33 seats inclusive of the driver\'s seat; motor vehicles in this class may be combined with a trailer having a maximum authorized tare which does not exceed 750kg',
            ],
            [
                'class'         => 'DE',
                'description'   => 'Heavy Motor Coach – Combination of motor coach having a seating capacity of 33 seats inclusive of the driver\'s seat and it\'s trailer having maximum authorized tare exceeding 750kg or a combination of two motor coaches',
            ],
            [
                'class'         => 'G1',
                'description'   => 'Hand Tractors – Two Wheel Tractor with a Trailer',
            ],
            [
                'class'         => 'G',
                'description'   => 'Land Vehicle – Agricultural Land Vehicle with or without a trailer',
            ],
            [
                'class'         => 'J',
                'description'   => 'Special purpose Vehicle – Vehicle used for construction, loading & unloading excluding motor lorries, light motor lorries and heavy motor lorries, equipped with construction equipment and equipment for loading and unloading goods',
            ],
        ];

        DB::table(config('license.vehicle_classes_table'))->insert($vehicle_classes);

        $this->enableForeignKeys();
    }
}
