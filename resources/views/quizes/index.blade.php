<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Beschikbare quizes</h1>

        <table class="table table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-2xl text-gray-800 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Quiz</th>
                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Status</th>
                </tr>
            </thead>
            <tbody scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800 border-r">
                @foreach ($quizes as $quiz)
                    <tr class="my-5 border-b">
                        @if (array_key_exists($quiz->id, $completedQuizes))
                            <!-- Quiz is completed -->
                            <td class="px-5 py-5 text-red-500 text-3xl">{{ $quiz->name }}</td>
                            <td class="px-5 py-5 text-red-500">
                                Deze quiz is al gemaakt. <br>
                                Score: {{ $completedQuizes[$quiz->id]['score'] }} <br>
                                Voltooid op: {{ \Carbon\Carbon::parse($completedQuizes[$quiz->id]['completed_at'])->format('d-m-Y H:i') }}
                            </td>
                        @else
                            <tr class="py-10">
                                <td><a class="py-10 px-5 my-10 text-green-400 text-slate-500 text-3xl hover:bg-gray-200 hover:rounded" href="{{ route('quiz.show', ['id' => $quiz->id]) }}">
                                    {{ $quiz->name }}
                                </a></td>
                                <td class="py-10 px-5 text-green-400">Deze quiz is beschikbaar.</td>
                            </tr>
                        @endif
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </x-slot>
</x-app-layout>

