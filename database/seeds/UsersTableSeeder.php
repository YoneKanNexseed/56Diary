<?php

use Illuminate\Database\Seeder;
// 追加
use Carbon\Carbon;
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
        DB::table('users')->insert([
            // カラム名 => 値
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('123456'),  // bcrypt：暗号化してくれる
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
