<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
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
        $this->truncate(config('access.users_table'));

        //Add the master administrator, user id of 1
        $users = [
            [
                'surname'           => 'Admin',
                'other_names'       => 'Istrator',
                'email'             => 'admin@admin.com',
                'password'          => bcrypt('1234'),
                'phone'             => null,
                'verified'          => true,
                'address'           => null,
                'nic'               => null,
                'passport'          => null,
                'date_of_birth'     => null,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'Backend',
                'other_names'       => 'User',
                'email'             => 'executive@executive.com',
                'password'          => bcrypt('1234'),
                'phone'             => null,
                'verified'          => true,
                'address'           => null,
                'nic'               => null,
                'passport'          => null,
                'date_of_birth'     => null,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'Default',
                'other_names'       => 'User',
                'email'             => 'user@user.com',
                'password'          => bcrypt('1234'),
                'phone'             => null,
                'verified'          => true,
                'address'           => null,
                'nic'               => null,
                'passport'          => null,
                'date_of_birth'     => null,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'Traffic Police',
                'other_names'       => 'Officer',
                'email'             => 'officer@officer.com',
                'password'          => bcrypt('1234'),
                'phone'             => null,
                'verified'          => true,
                'address'           => null,
                'nic'               => null,
                'passport'          => null,
                'date_of_birth'     => null,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'Licensed',
                'other_names'       => 'Motorist',
                'email'             => 'motorist@motorist.com',
                'password'          => bcrypt('1234'),
                'phone'             => '0786160384',
                'verified'          => true,
                'address'           => '150/4/2, Pallanwattha, Pannipitiya',
                'nic'               => '912921549v',
                'passport'          => null,
                'date_of_birth'     => '1991-10-18',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.users_table'))->insert($users);

        $this->enableForeignKeys();
    }
}
