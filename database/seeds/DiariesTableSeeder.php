<?php

use Illuminate\Database\Seeder;
// use＝require_once
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 配列でサンプルデータを作成
        $diaries = [
            [
                'title' => '初めてのLaravel',
                'body' => '難しいなぁ'
            ],
            [
                'title' => '初めてのセブ',
                'body' => '渋滞がぱねー'
            ],
            [
                'title' => '初めてのPC',
                'body' => 'ぽちぽち'
            ]
        ];

        // 配列をループで回して、テーブルにINSERTする
        foreach ($diaries as $diary) {

            DB::table('diaries')->insert([
                'title' => $diary['title'],
                'body' => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

                // Carbon::now() 現在時刻
            ]);

        }

    }
}
