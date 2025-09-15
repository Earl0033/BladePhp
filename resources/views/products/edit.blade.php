@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

        {{-- Error messages --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}"
                    class="mt-1 block w-full border rounded p-2">
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border rounded p-2">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" name="price" id="price"
                    value="{{ old('price', $product->price) }}" class="mt-1 block w-full border rounded p-2">
            </div>

            {{-- Stock --}}
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                    class="mt-1 block w-full border rounded p-2">
            </div>

            {{-- Current Image Preview --}}
            <div class="mb-4">
                <p class="text-sm font-medium text-gray-700 mb-2">Current Image</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                    class="w-40 h-40 object-cover rounded">

            </div>

            {{-- New Image Upload --}}
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700">Replace Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full border rounded p-2">
                <p class="text-gray-500 text-sm mt-1">Leave empty if you don’t want to change the image.</p>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
@endsection
