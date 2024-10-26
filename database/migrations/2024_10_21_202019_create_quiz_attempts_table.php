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
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')
                ->references('id')
                ->on('quizes')
                ->constrained();
            $table->foreignId('prepared_by')
                ->references('id')
                ->on('users')
                ->constrained();
            $table->timestamp('starting_at')->nullable();
            $table->timestamp('ending_at')->nullable();
            $table->enum('status', ['pending', 'completed'])->default('pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempt');
    }
};
