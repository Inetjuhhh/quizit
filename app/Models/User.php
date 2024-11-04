<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function authoredQuizes()
    {
        return $this->hasMany(Quiz::class, 'author_id');
    }

    public function quizes()
    {
        return $this->belongsToMany(Quiz::class, 'user_quiz')
                    ->withPivot('score', 'completed_at');
    }

    public function userQuizAttempt()
    {
        return $this->hasMany(UserQuizAttempt::class);
    }

    public function userQuestionVote()
    {
        return $this->hasMany(UserQuestionVote::class);
    }

    public function klas()
    {
        return $this->belongsTo(Klas::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
