<x-app-layout>
    <x-slot name="header">
        <section class="bg-white dark:bg-gray-900 ">
            <div class="py-8 px-4 max-w-7xl mx-auto max-w-screen-xxl sm:py-16 lg:px-6 flex items-center">
                <img src="{{ asset('storage/img/main-entrance-quiz.jpg')}}" alt="main-quiz-img" width="500px" class="mr-20 rounded-xl">
                <div class="max-w-5xl">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Welkom bij QuizIT</h2>
                    <p class="mb-8 fo nt-light text-gray-500 sm:text-xl dark:text-gray-400">Op deze pagina kan je alle quizes vinden die je kan spelen. Veel plezier!!!</p>
                </div>
            </div>
        </section>
    </x-slot>
</x-app-layout>

