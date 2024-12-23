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
        Schema::create('user_quiz_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_quiz_attempt_id')
                ->references('id')
                ->on('user_quiz_attempts')
                ->constrained();
            $table->foreignId('question_id')->constrained()
                ->references('id')
                ->on('questions');
            $table->foreignId('answer_id')
                ->nullable()
                ->constrained()
                ->references('id')
                ->on('answers');
            $table->text('open_answer')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quiz_responses');
    }
};
