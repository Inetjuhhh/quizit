@php
    $hasVoted = \App\Models\UserQuestionVote::where('user_id', auth()->id())
                   ->where('question_id', $questionId)
                   ->exists();
    $hasUpvoted = \App\Models\UserQuestionVote::where('user_id', auth()->id())
                   ->where('question_id', $questionId)
                   ->where('vote', 'up')
                   ->exists();
    $hasDownvoted = \App\Models\UserQuestionVote::where('user_id', auth()->id())
                   ->where('question_id', $questionId)
                   ->where('vote', 'down')
                   ->exists();
@endphp

<div class="flex items-center ">
     @if(!$hasVoted)
        <button wire:click="upvoteQuestionScore({{ $questionId }})" class="p-2 border rounded-full hover:bg-gray-100">
            <img src="{{ asset('storage/img/thumbs-up.png') }}" alt="thumbs-up" width="50px" class="rounded-xl">
        </button>
    @elseif(!$hasDownvoted)
        <img src="{{ asset('storage/img/thumbs-up.png') }}" alt="thumbs-up-voted" width="50px" class="rounded-xl opacity-50">
    @endif

    <span class="px-5 text-2xl font-bold">{{ $score }}</span>

    @if(!$hasVoted)
        <button wire:click="downvoteQuestionScore({{ $questionId }})" class="p-2 border rounded-full hover:bg-gray-100">
            <img src="{{ asset('storage/img/thumbs-down.png') }}" alt="thumbs-down" width="50px" class="rounded-xl">
        </button>
    @elseif(!$hasUpvoted)
        <img src="{{ asset('storage/img/thumbs-down.png') }}" alt="thumbs-down-voted" width="50px" class="rounded-xl opacity-50">
    @endif
</div>
