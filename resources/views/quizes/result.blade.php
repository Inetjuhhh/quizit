<x-app-layout>
    <x-slot name="header">

        <div class="border-solid border-2 border-slate-300 rounded-lg p-10">
            <h2 class="text-7xl my-5">{{$quiz->name}}</h1>
            <p class="text-2xl my-5">{{$quiz->description}}</p>
        </div>
        <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
            <h3 class="text-4xl my-5">Resultaten</h3>
            <ul>
                <li class="my-5">
                    <h4 class="text-3xl my-5">Jouw score: {{$score}}/{{$total }} ({{ $percentage }})%</h4>
                </li>
            </ul>
            @foreach($userQuizes as $userQuiz)
                <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
                    <div class="flex flex-col align-center">
                        <h3 class="text-3xl my-5">{{$userQuiz->question->question}}</h3>
                        <div class="flex justify-between items-center space-x-4">
                            @if($userQuiz->question->type->type == 'meerkeuze')
                                <h4 class="text-2xl italic my-5 {{ $userQuiz->is_correct ? 'text-green-500' : 'text-red-500' }}">{{$userQuiz->answer->answer}}</h4>
                                <h4 class="@if($userQuiz->is_correct) focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 @elseif($userQuiz->is_correct == 0) focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 @endif">@if($userQuiz->is_correct) 1 @else 0 @endif</h4>
                            @elseif($userQuiz->question->type->type == 'open')
                                <h4 class="text-2xl italic my-5 ">{{$userQuiz->open_answer}}</h4>
                                <h4 class="@if($userQuiz->is_correct) focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 @elseif($userQuiz->is_correct == 0) focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 @else focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 @endif">@if($userQuiz->is_correct) 1 @elseif($userQuiz->is_correct == 0) 0 @else Deze vraag wordt beoordeeld door de docent. @endif</h4>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </x-slot>
</x-app-layout>

