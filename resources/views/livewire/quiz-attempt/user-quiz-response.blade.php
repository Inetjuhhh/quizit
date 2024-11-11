<div>
    {{$record->responses}}

    <div class="quiz-info">
        <h2 class="text-xl">Resultaten van {{$record->user->name}} voor {{$record->attempt->quiz->name}}</h2>
        @if($record->completed_at)
            <p>Quiz voltooid op {{$record->completed_at}}</p>
        @else
            <p>Quiz nog niet voltooid</p>
        @endif
    </div>
    <table>
        <tr>
            <th>Vraag</th>
            <th>Antwoord</th>
            <th>Correct</th>
        </tr>
        @foreach($record->responses as $response)
            <tr>
                <td>{{$response->question->question}}</td>
                <td>
                    @if($response->question->type->type == 'meerkeuze')
                        {{$response->answer->answer}}
                    @elseif($response->question->type->type == 'open')
                        {{$response->open_answer}}
                    @endif
                </td>
                <td>
                    @if($response->is_correct)
                        <span class="text-green"></span>
                    @else
                        <span class="text-red"></span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

</div>
