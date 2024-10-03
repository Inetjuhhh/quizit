<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Beschikbare quizes</h1>

        <div class="quizes">
            <ul>
                @foreach ($quizes as $quiz)
                <div class="my-5">
                    <li>
                        @if(!in_array($quiz->id, $completedQuizes))
                            <a class="p-1 text-slate-500 text-3xl hover:bg-gray-200 hover:rounded" href="{{ route('quiz.show', ['id' => $quiz->id]) }}">{{$quiz->name}}</a>
                            <p class="text-green-400">Deze quiz is beschikbaar.</p>
                        @else
                            <p class="p-1 text-red-500 text-3xl" href="{{ route('quiz.show', ['id' => $quiz->id]) }}">{{$quiz->name}}</a>
                            <p class="text-red-500">Deze quiz is al gemaakt. </p>
                        @endif
                    </li>
                </div>
                @endforeach
            </ul>
        </div>

    </x-slot>
</x-app-layout>

