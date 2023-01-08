<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name' => 'user',
            ],
            [
                'name' => 'manager',
            ],
            [
                'name' => 'admin',
            ],
            [
                'name' => 'super-admin',
            ]
        );
    }
}
