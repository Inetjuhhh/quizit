
<div class="flex flex-col justify-center">
    <input type="text" wire:change="setScore" wire:model="score" class="text-white w-12 rounded-lg bg-transparent text-center @if($score > 0)bg-green-800 @elseif($score == 0) bg-red-900 @endif">
    @if($score !== NULL)
        <label class="italic" for="">Score ingevuld</label>
    @else
        <label class="italic" for="">Geef een score in</label>
    @endif
</div>
