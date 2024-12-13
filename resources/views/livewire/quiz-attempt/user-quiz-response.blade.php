<div>
    <div class="quiz-info">
        <h2 class="text-xl mb-3">Resultaten van {{$record->user->name}} voor {{$record->attempt->quiz->name}}</h2>
        @if($record->completed_at)
            <p class="italic">Quiz voltooid op {{$record->completed_at}}</p>
        @else
            <p class="italic">Quiz nog niet voltooid</p>
        @endif
    </div>
    <div class="mt-5 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Vraag</th>
                    <th scope="col" class="px-6 py-3">Antwoord</th>
                    <th scope="col" class="px-6 py-3">Correct</th>
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
                            <x-button-score
                            :answerText="$response->open_answer"
                            :isCorrect="$response->is_correct"
                            :buttonText="$response->is_correct
                                ? 1
                                : ($response->is_correct === 0 ? 0 : 'Deze vraag wordt beoordeeld door de docent.')"
                        />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
