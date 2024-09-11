<x-app-layout>
    <x-slot name="header">
        <h1>{{$quiz->name}}</h1>
        <p>{{$quiz->description}}</p>
        <p>{{$quiz->questions->count()}} vragen</p>
        {{-- <a href="{{route('quizes.play', $quiz->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Speel quiz</a> --}}
    </x-slot>
</x-app-layout>

