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
                'fine'              => 1000.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Parking',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Signal/directions of Police Officer',
                'fine'              => 1000.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Without D. L.',
                'fine'              => 2500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Driving under 18 years of age',
                'fine'              => 5000.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Employing person without D. L.',
                'fine'              => 3000.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'R. L. not carried',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Contraventing R. L. restrictions',
                'fine'              => 1000.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Signals by Driver',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Position of driver',
                'fine'              => 100.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'No. of persons in front seat',
                'fine'              => 100.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Sound or light warnings',
                'fine'              => 100.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Reversing',
                'fine'              => 20.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Riding on Running Boards etc.',
                'fine'              => 100.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Precautions unattended vehicle',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Carriage of persons in excess',
                'fine'              => 150.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Persons who may be carried in lorry',
                'fine'              => 150.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Distribution of advertisements',
                'fine'              => 100.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Identification Plates',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Shape of Identification Plates',
                'fine'              => 100.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Precautions when petrol is taken',
                'fine'              => 20.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Failing to keep to left of road',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Obstruction moving from one lane to another',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Not allowing traffic to overtake',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Overtaking without clear view',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Improper overtaking',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Obstruction while driving along side or overtaking',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Obstruction crossing highway',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Obstruction entering highway',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Obstruction moving from one highway to another',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Obstructing traffic on main road',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Failing to give way to traffic from the right',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Not slowing for safe passage on narrow highway',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Failing to keep to left when turning left',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
            [
                'description'       => 'Fail to position vehicle on center of road when turning right',
                'fine'              => 500.00,
                'dip'               => 0,
            ],
        ];

        DB::table(config('fine.offences_table'))->insert($offences);

        $this->enableForeignKeys();
    }
}
