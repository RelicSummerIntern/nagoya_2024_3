<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    # どのテーブルに関連しているかを指定
    protected $table = 'schools';

    # マスアサインメントを許可する属性
    protected $fillable = [
        'school_name',
    ];

    # タイムスタンプがない場合は、これを無効にする
    public $timestamps = false;

    /**
     * リレーションシップ: 大学は何人ものユーザに属する
     */
    public function students()
    {
        return $this->belongToMany(Student::class, 'school_id');
    }

}
