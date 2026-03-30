<div class="m-auto w-1/2 mb-4">
    <h3 class="text-lg text-gray-200 mb-3">Edit Article</h3>
    {{-- <div wire:dirty>Form data has changed</div> --}}
    {{-- <div wire:dirty.remove>Form data has not changed</div> --}}

    <form wire:submit="save">
        <div class="mb-3">
            <label wire:target='form.title' wire:dirty.class='text-orange-400' class="block" for="article-title">Title<span
                    wire:dirty wire:target='form.title'>*</span></label>
            <input type="text" class="p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="form.title">
            <div>
                @error('title')
                    <span class="text-red-600"">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label wire:target='form.content' wire:dirty.class='text-orange-400' class="block"
                for="article-content">Content<span wire:dirty wire:target='form.content'>*</span></label>
            <textarea id="article-content"" class="p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="form.content"></textarea>
            <div>
                @error('content')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label wire:target='form.published' wire:dirty.class='text-orange-400' class="flex items-center">
                <input type="checkbox" name="published" class="mr-2" wire:model.boolean="form.published" />
                Published<span wire:dirty wire:target='form.published'>*</span>
            </label>
        </div>
        <div class="mb-3">
            <div>
                <div wire:target='form.notifications' wire:dirty.class='text-orange-400' class="mb-2">Notification
                    Options<span wire:dirty wire:target='form.notifications'>*</span></div>
                <div class="flex gap-6">
                    <label class="flex items-center">
                        <input type="radio" value="true" class="mr-2"
                            wire:model.boolean="form.allowNotifications" />
                        Yes
                    </label>
                    <label class="flex items-center">
                        <input type="radio" value="false" class="mr-2"
                            wire:model.boolean="form.allowNotifications" />
                        No
                    </label>
                </div>

                <div class="flex flex-col gap-2 mt-4" x-show="$wire.form.allowNotifications">
                    <label class="flex items-center">
                        <input type="checkbox" value="email" class="mr-2" wire:model="form.notifications" />
                        Email
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" value="sms" class="mr-2" wire:model="form.notifications" />
                        SMS
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" value="push" class="mr-2" wire:model="form.notifications" />
                        Push
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button class="text-gray-200 p-2 bg-blue-700 rounded-sm disabled:opacity-75 disabled:bg-gray-400"
                type="submit" wire:dirty.class='hover:bg-blue-900' wire:dirty.attr.remove='disabled' disabled>
                Save
            </button>
        </div>
    </form>
</div>
