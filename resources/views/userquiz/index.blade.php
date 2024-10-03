<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl my-10">Uitgevoerde quizes</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="table table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-2xl text-gray-700 uppercase dark:text-gray-400">
                    <tr class="">
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Quiz</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Score</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Voltooid op</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->quizes as $quiz)
                    <tr class="border-b border-gray-200 dark:border-gray-700 text-xs">
                        <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800"><a class="text-slate-500 text-3xl" href="">{{$quiz->name}}</a></td>
                        <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{$quiz->pivot->score}}</td>
                        <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{$quiz->pivot->completed_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-slot>
</x-app-layout>

