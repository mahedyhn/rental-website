<div>
    <form wire:submit.prevent="saveProperty" class="space-y-4">
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" wire:model="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" wire:model="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="rent_price" class="block text-sm font-medium text-gray-700">Rent Price (Monthly)</label>
            <input type="number" wire:model="rent_price" id="rent_price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('rent_price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="bedrooms" class="block text-sm font-medium text-gray-700">Bedrooms</label>
                <input type="number" wire:model="bedrooms" id="bedrooms" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('bedrooms') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                <input type="number" wire:model="bathrooms" id="bathrooms" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('bathrooms') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Add Property
            </button>
        </div>
    </form>
</div>