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
            <ul>
                @foreach($userQuizes as $userQuiz)
                    <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
                        <div class="flex flex-col align-center">
                            <h3 class="text-3xl my-5">{{ $userQuiz->question->question }}</h3>
                            <div class="flex justify-between items-center space-x-4">
                                @if($userQuiz->question->type->type == 'meerkeuze')
                                    <x-button-score
                                        :answerText="$userQuiz->answer->answer"
                                        :isCorrect="$userQuiz->is_correct"
                                        :buttonText="$userQuiz->is_correct ? 1 : 0"
                                    />
                                @elseif($userQuiz->question->type->type == 'open')
                                    <x-button-score
                                        :answerText="$userQuiz->open_answer"
                                        :isCorrect="$userQuiz->is_correct"
                                        :buttonText="$userQuiz->is_correct
                                            ? 1
                                            : ($userQuiz->is_correct === 0 ? 0 : 'Deze vraag wordt beoordeeld door de docent.')"
                                    />
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>

        </div>

    </x-slot>
</x-app-layout>

