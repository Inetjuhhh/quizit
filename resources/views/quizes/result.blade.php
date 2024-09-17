<x-app-layout>
    <x-slot name="header">

        <div class="border-solid border-2 border-slate-300 rounded-lg p-10">
            <h2 class="text-7xl my-5">{{$quiz->name}}</h1>
            <p class="text-2xl my-5">{{$quiz->description}}</p>
        </div>
        <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
            <h3 class="text-4xl my-5">Resultaten</h3>
            <ul>
                @foreach($quiz->questions as $question)
                    <li class="my-5">
                        <h4 class="text-2xl my-5">{{$question->question}}</h4>
                        <ul>
                            @foreach($question->answers as $answer)
                                <li class="my-5">
                                    <input type="radio" id="{{$answer->id}}" name="{{$question->id}}" value="{{$answer->id}}" disabled>
                                    <label class="text-xl" for="{{$answer->id}}">{{$answer->answer}}</label>
                                    @if($answer->correct)
                                        <span class="text-green-500">Correct</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </x-slot>
</x-app-layout>

