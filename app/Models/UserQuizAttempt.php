<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizAttempt extends Model
{
    use HasFactory;

    protected $table = 'user_quiz_attempts';

    protected $guarded = [];

    protected $casts = [
        'users' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attempt()
    {
        return $this->belongsTo(QuizAttempt::class, 'attempt_id');
    }

    public function responses()
    {
        return $this->hasMany(UserQuizResponse::class, 'user_quiz_attempt_id');
    }



}
