<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // ここに設定されたカラム以外には値が設定できないよ という設定
    // $fillable：これは決まった名前
    protected $fillable = [
        'name', 'email', 'password', 'picture_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // テーブルの関係性の設定
    public function diaries()
    {
        // $this = usersテーブル
        // usersテーブルは0個以上diariesテーブルのデータを持っている
        return $this->hasMany('App\Diary');
    }
}
