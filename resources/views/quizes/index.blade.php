<x-app-layout>
    <x-slot name="header">
        <x-heading>
            Beschikbare Quizes
        </x-heading>
        <table class="table table-auto w-full border rounded-md text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 dark:bg-gray-50">
            <thead class="text-2xl text-gray-800 uppercase dark:text-gray-400 ">
                <tr class="border-b">
                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Quiz</th>
                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Status</th>
                </tr>
            </thead>
            <tbody scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-600 border-r">
                @foreach ($userQuizAttempts as $userQuizAttempt)
                    <tr class="my-5 items-center">
                        @if (array_key_exists($userQuizAttempt->id, $completedQuizes))
                            <!-- Quiz is completed -->
                            <td class="flex flex-row justify-between items-center">
                                <h4 class="px-5 py-5 text-red-500 text-3xl">{{ $userQuizAttempt->attempt->quiz->name }}</h4>
                                <a class="bg-amber-400 rounded text-gray-800 hover:bg-amber-600 p-4 mr-3" href="{{route('userquiz.result', $userQuizAttempt->id)}}">Ga naar uitgevoerde quiz</a>
                            </td>
                            <td class="px-5 py-5 text-red-500 border">
                                Deze quiz is al gemaakt. <br>
                                Score: {{ $userQuizAttempt->responses->sum('is_correct') }} <br>
                                Voltooid op: {{ \Carbon\Carbon::parse($userQuizAttempt->completed_at)->format('d-m-Y H:i') }}
                            </td>
                        @else
                            <tr class="py-10">
                                <td class="flex flex-row justify-between items-center border-b">
                                    <h4 class="py-2 pr-9 pl-5 w-48 my-10 text-green-400 text-slate-500 text-3xl hover:text-white-500 hover:bg-gray-200 hover:rounded">{{ $userQuizAttempt->attempt->quiz->name }}</h4>
                                    <a class="bg-amber-400 rounded text-gray-800 p-4 mr-3" href="{{ route('quiz.show', ['id' => $userQuizAttempt->attempt->quiz->id, 'user_quiz_attempt_id' => $userQuizAttempt->id]) }}">
                                    Speel quiz</a>
                                </td>
                                <td class="py-10 px-5 text-green-400 border">Deze quiz is beschikbaar.</td>
                            </tr>
                        @endif
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </x-slot>
</x-app-layout>

