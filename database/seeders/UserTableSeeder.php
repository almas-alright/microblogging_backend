<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Fayzur Almas', 'username'=> 'almas', 'email' => 'kutsnalmas@gmail.com', 'password' => bcrypt('abcd1234'), 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['name' => 'Another User', 'username'=> 'another_user', 'email' => 'another@gmail.com', 'password' => bcrypt('abcd1234'), 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['name' => 'Good User', 'username'=> 'good_user', 'email' => 'good@gmail.com', 'password' => bcrypt('abcd1234'), 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['name' => 'Bad User', 'username'=> 'bad_user', 'email' => 'bad@gmail.com', 'password' => bcrypt('abcd1234'), 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['name' => 'Fake User', 'username'=> 'fake_user', 'email' => 'fake@gmail.com', 'password' => bcrypt('abcd1234'), 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
        ]);
    }
}
