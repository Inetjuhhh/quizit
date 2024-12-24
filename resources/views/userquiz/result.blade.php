<x-app-layout>
    <x-slot name="header">

        <div class="border-solid border-2 border-slate-500 rounded-lg p-10 bg-slate-300">
            <x-heading>
                {{$userQuizAttempt->attempt->quiz->name}}
            </x-heading>
            <p class="text-2xl my-5 pl-5">{{$userQuizAttempt->attempt->quiz->description}}</p>
        </div>
        <div class="border-solid border-2 border-slate-500 rounded-lg p-10 my-5 bg-slate-300">
            <h3 class="text-4xl my-5">Resultaten</h3>
            <ul>
                <li class="my-5">
                    <h4 class="text-3xl my-5">Jouw score: {{$score}}/{{$total }} ({{ $percentage }})%</h4>
                </li>
            </ul>
            <ul>
                @foreach($userQuizResponses as $response)
                <div class="border-solid border-2 border-slate-500 rounded-lg p-10 my-5 bg-slate-300">
                    <div class="flex flex-col align-center">
                        <h3 class="text-3xl my-5">{{ $response->question->question }}</h3>
                        <div class="flex justify-between items-center space-x-4">
                            @if($response->question->type->type == 'meerkeuze')
                                <x-button-score
                                    :answerText="$response->answer->answer"
                                    :isCorrect="$response->is_correct"
                                    :buttonText="$response->is_correct ? 1 : 0"
                                />
                            @elseif($response->question->type->type == 'open')
                                <x-button-score
                                    :answerText="$response->open_answer"
                                    :isCorrect="$response->is_correct"
                                    :buttonText="$response->is_correct
                                        ? 1
                                        : ($response->is_correct === 0 ? 0 : 'Deze vraag wordt beoordeeld door de docent.')"
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

