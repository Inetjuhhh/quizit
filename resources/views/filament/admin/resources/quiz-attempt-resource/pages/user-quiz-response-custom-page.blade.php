@vite('resources/css/app.css')
<x-filament-panels::page>
    @livewire('quiz-attempt.user-quiz-response', ['record' => $record])
</x-filament-panels::page>
