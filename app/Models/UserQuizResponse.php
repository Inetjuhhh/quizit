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

    public function questions()
    {
        return $this->hasMany(Question::class, 'question_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'answer_id');
    }




}
