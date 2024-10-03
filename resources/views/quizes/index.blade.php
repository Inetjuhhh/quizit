<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Beschikbare quizes</h1>

        <div class="quizes">
            <ul>
                @foreach ($quizes as $quiz)
                <div class="my-5">
                    <li>
                        @if (array_key_exists($quiz->id, $completedQuizes))
                            <!-- Quiz is completed -->
                            <p class="p-1 text-red-500 text-3xl">{{ $quiz->name }}</p>
                            <p class="p-1 text-red-500">
                                Deze quiz is al gemaakt. <br>
                                Score: {{ $completedQuizes[$quiz->id]['score'] }} <br>
                                Voltooid op: {{ \Carbon\Carbon::parse($completedQuizes[$quiz->id]['completed_at'])->format('d-m-Y H:i') }}
                            </p>
                        @else
                            <a class="p-1 text-slate-500 text-3xl hover:bg-gray-200 hover:rounded" href="{{ route('quiz.show', ['id' => $quiz->id]) }}">
                                {{ $quiz->name }}
                            </a>
                            <p class="p-1 text-green-400">Deze quiz is beschikbaar.</p>
                        @endif
                    </li>
                </div>
                @endforeach
            </ul>
        </div>

    </x-slot>
</x-app-layout>

