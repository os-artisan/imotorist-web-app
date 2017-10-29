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
                'phone'             => '0715478932',
                'verified'          => true,
                'address'           => '41, Madiwela, Kotte',
                'nic'               => '902921310v',
                'passport'          => null,
                'date_of_birth'     => '1990-05-17',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'Pathagama Kuruppuge',
                'other_names'       => 'Tharindu',
                'email'             => 'pktharindu@outlook.com',
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
            [
                'surname'           => 'Wijekoon',
                'other_names'       => 'Chathura',
                'email'             => 'chathiwi@gmail.com',
                'password'          => bcrypt('1234'),
                'phone'             => '0772256488',
                'verified'          => true,
                'address'           => '87/3, Sangabo Mawatha, Anuradhapura',
                'nic'               => '864162458v',
                'passport'          => null,
                'date_of_birth'     => '1987-06-04',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'De Silva',
                'other_names'       => 'Chamal',
                'email'             => 'chamal777@gmail.com',
                'password'          => bcrypt('1234'),
                'phone'             => '0771487692',
                'verified'          => true,
                'address'           => '83/8, Erewwala, Pannipitiya',
                'nic'               => '854367246v',
                'passport'          => null,
                'date_of_birth'     => '1985-05-02',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'surname'           => 'Perera',
                'other_names'       => 'Madusanka',
                'email'             => 'madushanka.perera@ymail.com',
                'password'          => bcrypt('1234'),
                'phone'             => '0754786324',
                'verified'          => true,
                'address'           => '41, Kelaniya, Peliyagoda',
                'nic'               => '914532451v',
                'passport'          => null,
                'date_of_birth'     => '1991-08-07',
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
