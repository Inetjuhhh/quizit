<x-app-layout>
    <x-slot name="header">

        <div class="border-solid border-2 border-slate-300 rounded-lg p-10">
            <h2 class="text-7xl my-5">{{$quiz->name}}</h1>
            <p class="text-2xl my-5">{{$quiz->description}}</p>
        </div>
        <div class="border-solid border-2 border-slate-300 rounded-lg p-10 my-5 bg-slate-100">
            <h3 class="text-4xl my-5">Resultaten</h3>
            <ul>
                <li class="my-5">
                    <h4 class="text-3xl my-5">Jouw score: {{$score}}/{{$total }} ({{ $percentage }})%</h4>
                </li>
            </ul>
        </div>

    </x-slot>
</x-app-layout>

