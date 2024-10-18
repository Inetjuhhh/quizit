<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $guarded = [];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function quizes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_question');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'question_category');
    }

    public function reviewQuestion()
    {
        return $this->hasOne(ReviewQuestion::class);
    }

    public function userQuestionVotes()
    {
        return $this->hasMany(UserQuestionVote::class);
    }

    public function userQuizResponse()
    {
        return $this->belongsTo(UserQuizResponse::class, 'question_id');
    }
}
