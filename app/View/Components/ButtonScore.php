<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonScore extends Component
{
    /**
     * Create a new component instance.
     */
    public $answerText;
    public $isCorrect;
    public $buttonText;

    public function __construct($answerText, $isCorrect, $buttonText)
    {
        $this->answerText = $answerText;
        $this->isCorrect = $isCorrect;
        $this->buttonText = $buttonText;
    }

    // Method to determine the button class based on correctness
    public function getButtonClass()
    {
        if ($this->isCorrect === 1) {
            return 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        } elseif ($this->isCorrect === 0) {
            return 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';
        } else {
            return 'focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-score');
    }
}
