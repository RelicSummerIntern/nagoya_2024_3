<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('middles', function (Blueprint $table) {
            $table->id(); #中間ID
            $table->foreignId('score_id')->constrained(); #スコアIDを参照
            $table->foreignId('user_id')->constrained(); #ユーザIDを参照
            $table->foreignId('exam_id')->constrained(); #模試IDを参照
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('middles');
    }
};
