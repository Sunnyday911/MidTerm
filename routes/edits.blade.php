<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Event') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <!-- Display the name as plain text -->
                        <div class="border-b mb-4 pb-2">
                            <span class="font-bold">Name:</span> {{ $item->name }}
                        </div>

                        <!-- Allow editing of other fields -->
                        <input type="date" name="date" value="{{ $item->date }}" class="border rounded w-full p-2" required>
                        <input type="number" name="price" value="{{ $item->price }}" class="border rounded w-full p-2" required>
                        <textarea name="description" class="border rounded w-full p-2">{{ $item->description }}</textarea>
                        <input type="file" name="image" class="border rounded w-full p-2">

                        <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded font-bold">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
