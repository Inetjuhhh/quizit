<x-app-layout>
    <x-slot name="header">

        <div class="border-solid border-2 border-slate-300 rounded-lg p-10">
            <h2 class="text-5xl my-5">{{$quiz->name}}</h1>
            <p class="text-2xl my-5">{{$quiz->description}}</p>
            @foreach ($categories as $category)
                <button class="bg-green-100 text-green-800 text-sm font-medium px-5 py-2 rounded dark:bg-green-900 dark:text-green-300">{{$category}}</button>
            @endforeach
            <p class="text-xl italic my-5">{{$quiz->questions->count()}} vragen</p>
            <a href="{{route('quiz.play', $quiz->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Speel quiz</a>
        </div>

    </x-slot>
</x-app-layout>

