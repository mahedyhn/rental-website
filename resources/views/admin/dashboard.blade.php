<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Total Users Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Total Users</h3>
                        <p class="mt-2 text-3xl font-bold">{{ $totalUsers }}</p>
                    </div>
                </div>

                <!-- Total Properties Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Total Properties</h3>
                        <p class="mt-2 text-3xl font-bold">{{ $totalProperties }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Quick Links</h3>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Manage Users</a>
                        <a href="{{ route('admin.properties.index') }}" class="px-4 py-2 bg-green-500 text-white rounded-md">Manage Properties</a>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>


HTML

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Name</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Email</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Role</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Joined</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($users as $user)
                            <tr class="border-b">
                                <td class="py-3 px-4">{{ $user->name }}</td>
                                <td class="py-3 px-4">{{ $user->email }}</td>
                                <td class="py-3 px-4 capitalize">{{ $user->role }}</td>
                                <td class="py-3 px-4">{{ $user->created_at->format('d M, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>