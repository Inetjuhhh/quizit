<div class="flex flex-col justify-center">
    <input type="text" wire:change="setScore" wire:model="score" class="@if($score > 0)bg-lime-700 text-white  @endif w-12 rounded-lg bg-transparent text-center">
    <label class="italic" for="">In te vullen door de docent</label>
</div>
