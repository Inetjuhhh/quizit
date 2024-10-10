<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QuizIT</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <x-app-layout>
            <x-slot name="header">
                <section class="bg-white dark:bg-gray-900 ">
                    <div class="py-8 px-4 max-w-7xl mx-auto max-w-screen-xxl sm:py-16 lg:px-6 flex items-center">
                        <img src="{{ asset('storage/img/main-entrance-quiz.jpg')}}" alt="main-quiz-img" width="480px" class="mr-20 rounded-xl">
                        <div class="max-w-5xl">
                            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Creer en doe je eigen favoriete quizes met QuizIT</h2>
                            <p class="mb-8 fo nt-light text-gray-500 sm:text-xl dark:text-gray-400">Met onze quiz-app kun je eenvoudig je eigen quizzes maken en uitvoeren, perfect voor educatieve doeleinden of gewoon voor de lol met vrienden. Kies uit verschillende vraagtypes, voeg je eigen vragen toe en test je kennis of die van anderen. De app biedt interactieve resultaten en houdt scores bij, zodat je altijd kunt zien wie de quizkampioen is. Maak leren en spelen leuker met je eigen persoonlijke quizzen!</p>
                            @if(!Auth::check())
                            <div class="flex">
                                <a href="{{ route('login') }}" class="mr-10 p-5 bg-gray-400 text-xl text-slate-50 rounded-xl hover:bg-gray-800">Log in</a>
                                <a href="{{ route('register') }}" class="p-5 bg-gray-400 text-xl text-slate-50 rounded-xl hover:bg-gray-800">Registreer</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
            </x-slot>
        </x-app-layout>
    </body>
</html>
