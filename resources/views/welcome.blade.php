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
                    <div class="py-8 px-4 max-w-7xl mx-auto max-w-screen-xxl sm:py-16 lg:px-6">
                        <div class="max-w-7xl">
                            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Creer en doe je eigen favoriete quizes met QuizIT</h2>
                            <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">Met onze quiz-app kun je eenvoudig je eigen quizzes maken en uitvoeren, perfect voor educatieve doeleinden of gewoon voor de lol met vrienden. Kies uit verschillende vraagtypes, voeg je eigen vragen toe en test je kennis of die van anderen. De app biedt interactieve resultaten en houdt scores bij, zodat je altijd kunt zien wie de quizkampioen is. Maak leren en spelen leuker met je eigen persoonlijke quizzen!</p>
                            {{-- <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                                <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                    Get started
                                </a>

                            </div> --}}
                        </div>
                    </div>
                </section>
            </x-slot>
        </x-app-layout>
    </body>
</html>
