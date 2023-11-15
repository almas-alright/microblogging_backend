<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('follows')->insert([
            ['user_id' => 2, 'following_user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 3, 'following_user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 4, 'following_user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 5, 'following_user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
        ]);
    }
}
