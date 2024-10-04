<div class="flex items-center ">
    <button wire:click="upvoteQuestionScore({{ $questionId }})" class="p-2 border rounded-full hover:bg-gray-100">
        <img src="{{ asset('storage/img/thumbs-up.png') }}" alt="thumbs-up" width="50px" class="rounded-xl">
    </button>

    <span class="px-5 text-2xl font-bold">{{ $score }}</span>

    <button wire:click="downvoteQuestionScore({{ $questionId }})" class="p-2 border rounded-full hover:bg-gray-100">
        <img src="{{ asset('storage/img/thumbs-down.png') }}" alt="thumbs-down" width="50px" class="rounded-xl">
    </button>
</div>
