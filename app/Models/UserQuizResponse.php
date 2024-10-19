<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizResponse extends Model
{
    use HasFactory;

    protected $table = 'user_quiz_response';

    protected $guarded = [];

    public function userQuiz()
    {
        return $this->belongsTo(UserQuiz::class, 'user_quiz_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }




}
