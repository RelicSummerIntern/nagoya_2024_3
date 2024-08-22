<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 学生データを挿入
        $students = [
            [
                'student_name' => '河村 たかし',         // ユーザ名
                'password' => Hash::make('root'), // ハッシュ化されたパスワード
                'school_id' => 3,                  // 大学ID（外部キー）
            ],
            // さらにデータを追加する場合はここに追加
        ];

        // データを一括で挿入
        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
