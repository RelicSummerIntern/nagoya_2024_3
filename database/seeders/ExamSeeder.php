<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # 指定したデータを挿入
        $exams = [
            ['exam_name' => '第1回 全統共通テスト模試'],
            ['exam_name' => '第2回 全統共通テスト模試'],
            ['exam_name' => '第3回 全統共通テスト模試'],
            ['exam_name' => '第1回 駿台atama+共通テスト模試'],
            ['exam_name' => '第2回 駿台atama+共通テスト模試'],
            ['exam_name' => '第3回 駿台atama+共通テスト模試'],
            ['exam_name' => '第1回 駿台・ベネッセ大学入学共通テスト模試'],
        ];

        # データを一括で挿入
        foreach ($exams as $exam) {
            Exam::create($exam);
        }
    }
}
