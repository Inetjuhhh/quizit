<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index()
    {
        return view('userquiz.index')
            ->with('userquizes', auth()->user()->quizes);
    }
}
