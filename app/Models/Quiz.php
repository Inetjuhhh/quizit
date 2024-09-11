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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
