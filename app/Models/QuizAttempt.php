<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $table = 'quiz_attempts';

    protected $guarded = [];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function preparedBy()
    {
        return $this->belongsTo(User::class, 'prepared_by');
    }

    public function userQuizAttempt()
    {
        return $this->hasMany(UserQuizAttempt::class, 'attempt_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quiz_attempt', 'attempt_id', 'user_id');
    }
}
