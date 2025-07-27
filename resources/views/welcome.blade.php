<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center text-xl font-bold">
                        HouseRent
                    </a>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-medium text-gray-600 hover:text-gray-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-gray-900">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-medium text-gray-600 hover:text-gray-900">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Available Properties for Rent</h2>

            @if($properties->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($properties as $property)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img class="h-48 w-full object-cover" src="https://via.placeholder.com/400x250.png?text=Property+Image" alt="{{ $property->title }}">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800">{{ $property->title }}</h3>
                                <p class="text-gray-600 mt-2">{{ Str::limit($property->description, 100) }}</p>
                                <p class="text-gray-700 mt-2 font-bold">Address: {{ $property->address }}</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-2xl font-bold text-indigo-600">৳{{ number_format($property->rent_price) }}</span>
                                    <a href="#" class="px-4 py-2 bg-indigo-500 text-white text-sm font-medium rounded hover:bg-indigo-600">View Details</a>
                                </div>
                                <div class="mt-4 text-sm text-gray-500 flex justify-between">
                                    <span>{{ $property->bedrooms }} Bedrooms</span>
                                    <span>{{ $property->bathrooms }} Bathrooms</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $properties->links() }}
                </div>
            @else
                <p class="text-center text-gray-500">No properties available at the moment.</p>
            @endif
        </div>
    </main>
</body>
</html>