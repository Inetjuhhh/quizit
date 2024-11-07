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
        Schema::create('user_quiz_attempt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained()
                ->references('id')
                ->on('quiz_attempts');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->constrained();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quiz_attempt');
    }
};
