<div class="w-full">
    <form>
        <div class="flex gap-2">
            <input type="text" class="grow p-4 border rounded-md bg-gray-700 text-white" autocomplete="off"
                wire:model.live.debounce='searchText' placeholder="{{ $placeholder }}" wire:offline.attr='disabled' />

            <button class="text-white font-medium rounded-md p-4 bg-indigo-600 disabled:bg-gray-500"
                wire:click.prevent='clear()' {{ empty($searchText) ? 'disabled' : '' }}>
                Clear
            </button>
        </div>
    </form>

    @if (!empty($searchText))
        <div wire:transition>
            <livewire:search-results :results="$results" />
        </div>
    @endif
</div>
