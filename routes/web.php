<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserQuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/userpage', function () {
    return view('userpage');
})->middleware(['auth', 'verified'])->name('userpage');

Route::middleware('auth')->group(function () {
    Route::get('/quizes/index', [QuizController::class, 'index'])->name('quizes.index');
    Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/quiz/{id}/play', [QuizController::class, 'play'])->name('quiz.play');
    Route::post('/quiz/{id}/check', [QuizController::class, 'check'])->name('quiz.checkMultiple');
});

Route::middleware('auth')->group(function(){
    Route::get('/userquiz.index', [UserQuizController::class, 'index'])->name('userquiz.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
