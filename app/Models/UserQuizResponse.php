<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizResponse extends Model
{
    use HasFactory;

    protected $table = 'user_quiz_responses';

    protected $guarded = [];

    protected static ?string $model = UserQuizResponse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Gebruikers Quiz antwoorden';

    protected static ?string $modelLabel = 'Responses';

    protected static ?string $pluralModelLabel = 'Responses';


    public function userQuizAttempt()
    {
        return $this->belongsTo(UserQuizAttempt::class, 'user_quiz_attempt_id');
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
