<x-app-layout>
    <x-slot name="header">
        <div class="border-solid border-2 border-slate-300 rounded-lg p-10 bg-slate-100  ">
            <h2 class="text-5xl my-5">{{$quiz->name}}</h2>
            <p class="text-2xl my-5">{{$quiz->description}}</p>
        </div>
        <form action="{{ route('userquiz.checkQuestions', ['id' => $quiz->id, 'user_quiz_attempt_id' => $userQuizAttempt])}}" method="POST">
            @csrf
            @foreach($quiz->questions as $question)
                <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
                    <div class="flex justify-between align-center">
                        <h3 class="text-3xl my-5">{{$question->question}}</h3>
                        <div class="flex items-center space-x-4">
                            {{-- @livewire('test-comp') --}}
                            @livewire('review-question', ['questionId' => $question->id], key($question->id))
                        </div>
                    </div>
                    <ul>
                        @if($question->type->type == 'meerkeuze')

                            @foreach($question->answers as $answer)
                                <li class="my-5">
                                    <input type="radio" id="{{$answer->id}}" name="{{$question->id}}" value="{{$answer->id}}" class="hover:text-blue-400" required>
                                    <label class="text-xl" for="{{$answer->id}}">{{$answer->answer}}</label>
                                </li>
                            @endforeach

                        @elseif($question->type->type == 'open')
                            <input type="text" style="width:80%" name="{{$question->id}}" class="border-solid border-2 border-slate-300 rounded-lg p-2 my-5">
                        @else
                            <p>Geen type gevonden</p>
                        @endif
                    </ul>
                </div>
            @endforeach
            <input type="submit" class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-purple-100 hover:bg-purple-300 text-2xl" value="Check antwoorden">
        </form>
    </x-slot>
</x-app-layout>
