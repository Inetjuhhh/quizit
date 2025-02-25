<div>
    <div class="quiz-info">
        <h2 class="text-xl mb-3">Resultaten van {{$record->user->name}} voor {{$record->attempt->quiz->name}}</h2>
        @if($record->completed_at)
            <p class="italic">Quiz voltooid op {{$record->completed_at}}</p>
            <span>Score: {{$record->responses->sum('is_correct')}} / {{count($record->responses)}}</span><span class="@if($record->responses->sum('is_correct')/count($record->responses) > 0.7) text-green-500 @endif"> ({{round($record->responses->sum('is_correct')/count($record->responses) * 100, 1)}} %)</span>
        @else
            <p class="italic">Quiz nog niet voltooid</p>
        @endif
    </div>
    <div class="mt-5 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Vraag</th>
                    <th scope="col" class="px-6 py-3">Jouw Antwoord</th>
                    <th scope="col" class="px-6 py-3">Correcte antwoord</th>
                    <th scope="col" class="px-6 py-3">#punten</th>
                    <th scope="col" class="px-6 py-3">Score</th>
                </tr>
            </thead>

            <tbody>
                @foreach($record->responses as $response)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{$response->question->question}}</td>
                        <td class="px-6 py-4">
                            @if($response->question->type->type == 'meerkeuze')
                                {{$response->answer->answer}}
                            @elseif($response->question->type->type == 'open')
                                {{$response->open_answer}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <?php
                                if($response->question->type->type == 'meerkeuze') {
                                    $correctAnswer = $response->question->answers->where('is_correct', 1)->first();
                                    echo $correctAnswer->answer;
                                } elseif($response->question->type->type == 'open') {
                                    echo $response->question->answer->answer;
                                } else {
                                    echo 'Er is geen antwoord ingesteld';
                                }
                            ?>
                        </td>
                        <td class="text-center">{{$response->question->points}}</td>
                        <td class="px-6 py-4">

                            @if($response->question->type->type !== 'meerkeuze')
                                @livewire('quiz-attempt.response-open-question-score', ['response' => $response])
                            @else
                                <x-button-score
                                {{-- :answerText="$response->open_answer" --}}
                                :isCorrect="$response->is_correct"
                                :buttonText="$response->is_correct
                                    ? 1
                                    : ($response->is_correct === 0 ? 0 : '[X]')"
                            />
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right">
        <button onclick="location.reload()"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Resultaten opslaan</button>
    </div>
</div>
