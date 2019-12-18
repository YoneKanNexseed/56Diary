<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

    // 日記テーブルとユーザーテーブルの多対多の接続の設定
    public function likes()
    {
        // diariesテーブルとusersテーブルは、
        // likesテーブルを介して多対多の関係である
        return $this->belongsToMany('App\User', 'likes')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
