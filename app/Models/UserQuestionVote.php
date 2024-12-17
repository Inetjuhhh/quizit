<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestionVote extends Model
{
    use HasFactory;

    protected $table = 'user_question_votes';
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function klas()
    {
        return $this->belongsTo(Klas::class);
    }
}
