<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Event') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Event Form -->
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="space-y-2">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" name="name" placeholder="Name" class="border rounded w-full p-2" required>
                        </div>

                        <div class="space-y-2">
                            <label for="date" class="block text-gray-700">Date</label>
                            <input type="date" name="date" class="border rounded w-full p-2" required>
                        </div>

                        <div class="space-y-2">
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" name="price" placeholder="Price" class="border rounded w-full p-2" required>
                        </div>

                        <div class="space-y-2">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea name="description" placeholder="Description" class="border rounded w-full p-2"></textarea>
                        </div>

                        <div class="space-y-2">
                            <label for="image" class="block text-gray-700">Image</label>
                            <input type="file" name="image" class="border rounded w-full p-2">
                        </div>

                        <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded font-bold">Save</button>
                    </form>

                    <!-- Centered Event Items Header with Line -->
                    <h3 class="text-lg font-semibold text-center mt-8">Event Items</h3>
                    <hr class="my-4 border-gray-300">
                    
                    <!-- Event Items Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        @foreach($items as $item)
                            <div class="border border-gray-300 rounded-lg p-4 shadow-md">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-auto rounded mb-2">
                                @endif
                                <h3 class="font-bold text-lg">{{ $item->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $item->date }}</p>
                                <p class="text-sm text-gray-600">${{ $item->price }}</p>
                                <p class="text-sm text-gray-700">{{ $item->description }}</p>

                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
