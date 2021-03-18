<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Datetime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            [
                'id' => 1,
                'name' => 'hoge',
                'email' => 'hogehoge@gmail.com',
                'nickname' => 'fuga',
                'created_at' => new Datetime(),
                'updated_at' => new Datetime(),
            ]
        ]);
    }
}
