<div class="max-w-md w-full">
    <form>
        <div class="flex gap-2">
            <input type="text" class="w-9/12 p-4 border rounded-md bg-gray-700 text-white" autocomplete="off"
                wire:model.live.debounce='searchText' placeholder="{{ $placeholder }}" wire:offline.attr='disabled' />

            <button class="text-white font-medium rounded-md p-4 bg-indigo-600 disabled:bg-gray-500"
                wire:click.prevent='clear()' {{ empty($searchText) ? 'disabled' : '' }}>
                Clear
            </button>
        </div>
    </form>

    <livewire:search-results :results="$results" :show="!empty($searchText)" />
</div>
