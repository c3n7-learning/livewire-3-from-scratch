<div>
    <form wire:submit='changeName()'>
        <div class="mt-2">

        </div>
        <div class="mt-2">
            <select class="p-4 border rounded-md bg-gray-700 text-white" wire:model.fill='greeting'>
                <option value="Hello">Hello</option>
                <option value="Hi">Hi</option>
                <option value="Hey">Hey</option>
                <option value="Howdy" selected>Howdy</option>
            </select>
            <input type="text" class="p-4 border rounded-md bg-gray-700 text-white" autocomplete="off"
                wire:model.change='name' />
        </div>

        <div class="mt-2">
            <button type="submit" class="text-white font-medium rounded-md px-4 py-2 bg-blue-600">
                Greet
            </button>
        </div>
    </form>

    @if ($name !== '')
        <div class='mt-5'>
            {{ $greeting }}, {{ $name }}!
        </div>
    @endif
</div>
