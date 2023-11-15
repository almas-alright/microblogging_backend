<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reactions')->insert([
            ['user_id' => 1, 'post_id' => 3, 'liked' => false, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 2, 'post_id' => 3, 'liked' => true, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 3, 'post_id' => 3, 'liked' => true, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 4, 'post_id' => 3, 'liked' => true, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['user_id' => 5, 'post_id' => 3, 'liked' => true, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
        ]);
    }
}
