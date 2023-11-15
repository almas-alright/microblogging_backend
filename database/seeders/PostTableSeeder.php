<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            ['content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['content' => 'Another Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['content' => 'Fake Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 1, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 2, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 3, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 4, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
            ['content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'user_id' => 5, 'created_at' => Carbon::now('GMT+6'), 'updated_at' => Carbon::now('GMT+6')],
        ]);
    }
}
