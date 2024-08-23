<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    # どのテーブルに関連しているかを指定
    protected $table = 'exams';

    # マスアサインメントを許可する属性
    protected $fillable = [
        'exam_name',
    ];
    
    /**
     * リレーションシップ:
     * 模試はいくつかの学生が受ける
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'middle', 'student_id','exam_id');
    }

    # タイムスタンプがない場合は、これを無効にする
    public $timestamps = false;
}
