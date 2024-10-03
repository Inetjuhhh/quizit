<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('userquiz.index')
            ->with('user', $user);
    }
}
