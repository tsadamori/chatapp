<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Datetime;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'message' => 'hello world',
                'created_at' => new Datetime(),
                'updated_at' => new Datetime(),
            ]
        ]);
    }
}
