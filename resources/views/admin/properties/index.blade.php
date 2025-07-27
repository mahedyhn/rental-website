<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <table class="min-w-full bg-white">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Title</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Owner</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Price</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($properties as $property)
                            <tr class="border-b">
                                <td class="py-3 px-4">{{ $property->title }}</td>
                                <td class="py-3 px-4">{{ $property->owner->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4">৳{{ number_format($property->rent_price) }}</td>
                                <td class="py-3 px-4">
                                    @if($property->is_available)
                                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Available</span>
                                    @else
                                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Rented</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>