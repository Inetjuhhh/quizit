<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizes';

    protected $guarded = [];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_question');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quiz')
                    ->withPivot('score', 'completed_at');
    }

    public function quizAttempt()
    {
        return $this->hasMany(QuizAttempt::class, 'attempt_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
