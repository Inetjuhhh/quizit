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
        Schema::create('user_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->constrained();
            $table->foreignId('quiz_id')->constrained()
                ->references('id')
                ->on('quizes');
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
            $table->integer('score')->nullable();
            $table->integer('time')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quiz');
    }
};
