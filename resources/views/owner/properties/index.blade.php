<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Properties') }}
            </h2>
            <a href="{{ route('owner.properties.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                Add New Property
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Rent Price</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($properties as $property)
                                    <tr class="border-b">
                                        <td class="text-left py-3 px-4">{{ $property->title }}</td>
                                        <td class="text-left py-3 px-4">৳{{ number_format($property->rent_price) }}</td>
                                        <td class="text-left py-3 px-4">
                                            @if($property->is_available)
                                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Available</span>
                                            @else
                                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Rented</span>
                                            @endif
                                        </td>
                                        <td class="text-left py-3 px-4 flex space-x-2">
                                            <a href="{{ route('owner.properties.edit', $property) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('owner.properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">You have not added any properties yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>