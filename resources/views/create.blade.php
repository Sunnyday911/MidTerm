{{-- resources/views/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Add New Item</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
        </div>

        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date" id="date" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 p-2 border border-gray-300 rounded w-full" required></textarea>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded font-bold">Save</button>
    </form>
</div>
@endsection
