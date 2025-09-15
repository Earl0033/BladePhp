@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Products</h1>
            <a href="{{ route('products.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                + Add Product
            </a>
        </div>

        {{-- Flash message (for success after create) --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($products->count())
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        {{-- Image --}}
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            class="w-full h-48 object-cover">

                        {{-- Details --}}
                        <div class="p-4">
                            <h2 class="text-lg font-semibold">{{ $product->title }}</h2>
                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($product->description, 80) }}</p>
                            <p class="font-bold text-blue-600 mb-2">₱{{ number_format($product->price, 2) }}</p>
                            <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>
                        </div>

                        {{-- Actions --}}
                        <div class="px-4 pb-4 flex justify-between">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No products found. <a href="{{ route('products.create') }}" class="text-blue-600">Add
                    one now</a>.</p>
        @endif
    </div>
@endsection
