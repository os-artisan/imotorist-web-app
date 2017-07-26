<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class AccessTableSeeder.
 */
class LicenseTableSeeder extends Seeder
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

        $this->call(VehicleClassTableSeeder::class);
        $this->call(OtherVehicleClassTableSeeder::class);
        $this->call(MotoristVehicleClassTableSeeder::class);

        $this->enableForeignKeys();
    }
}
