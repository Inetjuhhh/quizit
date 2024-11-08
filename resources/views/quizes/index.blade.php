<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Beschikbare quizes</h1>

        <table class="table table-auto w-full border rounded-md text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 dark:bg-gray-50">
            <thead class="text-2xl text-gray-800 uppercase dark:text-gray-400 ">
                <tr class="border-b">
                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Quiz</th>
                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Status</th>
                </tr>
            </thead>
            <tbody scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-600 border-r">
                @foreach ($userQuizAttempts as $userQuizAttempt)
                    <tr class="my-5 border-r">
                        @if (array_key_exists($userQuizAttempt->id, $completedQuizes))
                            <!-- Quiz is completed -->
                            <td class="px-5 py-5 text-red-500 text-3xl border">{{ $userQuizAttempt->attempt->quiz->name }}</td>
                            <td class="px-5 py-5 text-red-500 border">
                                Deze quiz is al gemaakt. <br>
                                Score: {{ $userQuizAttempt->responses->sum('is_correct') }} <br>
                                Voltooid op: {{ \Carbon\Carbon::parse($userQuizAttempt->completed_at)->format('d-m-Y H:i') }}
                            </td>
                        @else
                            <tr class="py-10">
                                <td class="border"><a class="py-2 pr-9 pl-5 w-48 my-10 text-green-400 text-slate-500 text-3xl hover:text-white-500 hover:bg-gray-200 hover:rounded" href="{{ route('quiz.show', ['id' => $userQuizAttempt->attempt->quiz->id, 'user_quiz_attempt_id' => $userQuizAttempt->id]) }}">
                                    {{ $userQuizAttempt->attempt->quiz->name }}
                                </a></td>
                                <td class="py-10 px-5 text-green-400 border">Deze quiz is beschikbaar.</td>
                            </tr>
                        @endif
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </x-slot>
</x-app-layout>

