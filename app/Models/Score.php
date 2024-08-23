<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    # どのテーブルに関連しているかを指定
    protected $table = 'students';

    # マスアサインメントを許可する属性
    protected $fillable = [
        'subject_id', // 教科ID
        'score'  // 点数
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_id');
    }
}
