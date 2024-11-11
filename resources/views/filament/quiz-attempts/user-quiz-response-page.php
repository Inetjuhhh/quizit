<x-filament::modal-content>
    <div class="p-6">
        <x-filament::table :columns="$this->getTableColumns()" :query="$this->getTableQuery()" />
    </div>
</x-filament::modal-content>
