<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Uitgevoerde quizes</h1>

        <div class="quizes">
            <ul>
                @foreach ($userquizes as $quiz)
                <div class="my-5">
                    <li><a class="text-slate-500 text-3xl" href="{{ route('quiz.show', ['id' => $quiz->id]) }}">{{$quiz->name}}</a></li>
                </div>
                @endforeach
            </ul>
        </div>

    </x-slot>
</x-app-layout>

