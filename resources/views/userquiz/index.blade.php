@if (session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Uitgevoerde quizes</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="table table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-2xl text-gray-800 uppercase dark:text-gray-400" >
                    <tr class="">
                        <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Quiz</th>
                        <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800 border-r">Score</th>
                        <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-800">Voltooid op</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($executedUserQuizAttempts as $executedUserQuizAttempt)
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-xl">
                            <td scope="row" class="hover:bg-gray-900 px-6 py-3 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border-r">
                                <a href="{{ route('userquiz.result', ['id' => $executedUserQuizAttempt->id])}}" class="text-slate-500" >{{$executedUserQuizAttempt->attempt->quiz->name}}</a>
                                <p class="italic text-sm text-red-400">@if($executedUserQuizAttempt->responses->contains('is_correct', null))(Dit resultaat moet nog beoordeeld worden door een docent.)@endif</p>
                            </td>
                            <td scope="row" class="px-6 py-3 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 border-r">{{$executedUserQuizAttempt->responses->sum('is_correct')}} / {{$numberOfQuestions}} </td>
                            <td scope="row" class="px-6 py-3 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{\Carbon\Carbon::parse($executedUserQuizAttempt->completed_at)->format('d-m-Y H:i')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-slot>
</x-app-layout>

