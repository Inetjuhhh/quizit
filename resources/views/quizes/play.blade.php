<x-app-layout>
    <x-slot name="header">

        <div class="border-solid border-2 border-slate-300 rounded-lg p-10 bg-slate-100 ">
            <h2 class="text-7xl my-5">{{$quiz->name}}</h1>
            <p class="text-2xl my-5">{{$quiz->description}}</p>
        </div>
        @foreach($quiz->questions as $question)
            <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
                <h3 class="text-4xl my-5">{{$question->question}}</h3>
                <ul>
                    @foreach($question->answers as $answer)
                        <li class="my-5">
                            <input type="radio" id="{{$answer->id}}" name="{{$question->id}}" value="{{$answer->id}}">
                            <label for="{{$answer->id}}">{{$answer->answer}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </x-slot>
</x-app-layout>

