<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'tony',
            'email' => 'aaa@gmail.com',
            'password' => bcrypt('abcd1234')
        ];
        DB::table('users')->insert($param);
    }
}
