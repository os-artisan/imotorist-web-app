<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class DistrictTableSeeder.
 */
class DistrictTableSeeder extends Seeder
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
        $this->truncate(config('police.districts_table'));

        $districts = [
            [
                'division_id' => 1,
                'name' => 'Jaffna',
            ],
            [
                'division_id' => 1,
                'name' => 'Kilinochchi',
            ],
            [
                'division_id' => 1,
                'name' => 'Mannar',
            ],
            [
                'division_id' => 1,
                'name' => 'Mullaitivu',
            ],
            [
                'division_id' => 1,
                'name' => 'Vavuniya',
            ],
            [
                'division_id' => 2,
                'name' => 'Puttalam',
            ],
            [
                'division_id' => 2,
                'name' => 'Kurunegala',
            ],
            [
                'division_id' => 3,
                'name' => 'Gampaha',
            ],
            [
                'division_id' => 3,
                'name' => 'Colombo',
            ],
            [
                'division_id' => 3,
                'name' => 'Kalutara',
            ],
            [
                'division_id' => 4,
                'name' => 'Anuradhapura',
            ],
            [
                'division_id' => 4,
                'name' => 'Polonnaruwa',
            ],
            [
                'division_id' => 5,
                'name' => 'Matale',
            ],
            [
                'division_id' => 5,
                'name' => 'Kandy',
            ],
            [
                'division_id' => 5,
                'name' => 'Nuwara Eliya',
            ],
            [
                'division_id' => 6,
                'name' => 'Kegalle',
            ],
            [
                'division_id' => 6,
                'name' => 'Ratnapura',
            ],
            [
                'division_id' => 7,
                'name' => 'Trincomalee',
            ],
            [
                'division_id' => 7,
                'name' => 'Batticaloa',
            ],
            [
                'division_id' => 7,
                'name' => 'Ampara',
            ],
            [
                'division_id' => 8,
                'name' => 'Badulla',
            ],
            [
                'division_id' => 8,
                'name' => 'Monaragala',
            ],
            [
                'division_id' => 9,
                'name' => 'Hambantota',
            ],
            [
                'division_id' => 9,
                'name' => 'Matara',
            ],
            [
                'division_id' => 9,
                'name' => 'Galle',
            ],
        ];

        DB::table(config('police.districts_table'))->insert($districts);

        $this->enableForeignKeys();
    }
}
