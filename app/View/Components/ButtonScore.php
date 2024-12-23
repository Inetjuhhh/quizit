<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonScore extends Component
{
    public $answerText;
    public $isCorrect;
    public $buttonText;

    public function __construct($isCorrect, $buttonText, $answerText)
    {
        $this->answerText = $answerText;
        $this->isCorrect = $isCorrect;
        $this->buttonText = $buttonText;
    }

    public function getButtonClass()
    {
        if ($this->isCorrect === 1) {
            return 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        } elseif ($this->isCorrect === 0) {
            return 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';
        } else {
            return 'focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.button-score');
    }
}
