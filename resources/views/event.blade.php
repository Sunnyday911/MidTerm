<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Event') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="border rounded w-full p-2" required>
                        <input type="date" name="date" class="border rounded w-full p-2" required>
                        <input type="number" name="price" placeholder="Price" class="border rounded w-full p-2" required>
                        <textarea name="description" placeholder="Description" class="border rounded w-full p-2"></textarea>
                        <input type="file" name="image" class="border rounded w-full p-2">
                        <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded font-bold">Save</button>
                    </form>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        @foreach($items as $item)
                            <div class="border p-4 rounded">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-auto rounded mb-2">
                                @endif
                                <h3 class="font-bold">{{ $item->name }}</h3>
                                <p>{{ $item->date }}</p>
                                <p>${{ $item->price }}</p>
                                <p>{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
