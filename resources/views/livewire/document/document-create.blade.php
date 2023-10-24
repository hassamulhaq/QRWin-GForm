<div>
    <form wire:submit="save">
        <div class="sm:col-span-6">
            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
            <div class="mt-1">
                <x-input type="text"
                         id="name"
                         name="name"
                         class="block w-full border border-gray-400"
                         wire:model="name"/>
            </div>
            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-6 mt-4">
            <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
            <div class="mt-1">
                <x-input type="text"
                         id="description"
                         name="description"
                         class="block w-full border border-gray-400"
                         wire:model="description"/>
            </div>
            @error('description') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="sm:col-span-6 mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
            <div class="mt-1">
                <x-input type="text"
                         id="password"
                         name="password"
                         class="block w-full border border-gray-400"
                         wire:model="password"/>
            </div>
            @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="sm:col-span-6 mt-4">
            <label for="document" class="block text-sm font-medium text-gray-700"> Description </label>
            <div class="mt-1">
                <input type="file" wire:model="document">
            </div>
            @error('document') <span class="error text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <span wire:loading>Saving...</span>

        <div class="sm:col-span-6 pt-5">
            <x-button type="submit">
                Save document
            </x-button>
        </div>
    </form>
</div>
