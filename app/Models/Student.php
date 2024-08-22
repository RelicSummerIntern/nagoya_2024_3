<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    # どのテーブルに関連しているかを指定
    protected $table = 'students';

    # マスアサインメントを許可する属性
    protected $fillable = [
        'student_name', // ユーザ名
        'password',  // パスワード
        'school_id'  // 大学ID（外部キー）
    ];

    /**
     * リレーションシップ:
     * 学生は一つの学校に属する
     */
    public function school()
    {
        return $this->hasOne(School::class, 'school_id');
    }

    /**
     * リレーションシップ:
     * 学生はいくつかの模試を受ける
     */
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'middle', 'student_id', 'exam_id');
    }
}
