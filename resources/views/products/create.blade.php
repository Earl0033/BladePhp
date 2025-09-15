@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Create New Product</h1>

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                {{-- Image --}}
                <div>
                    <label for="image" class="block font-medium">Product Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border rounded p-2">
                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Title --}}
                <div>
                    <label for="title" class="block font-medium">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="mt-1 block w-full border rounded p-2">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block font-medium">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full border rounded p-2">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Price --}}
                <div>
                    <label for="price" class="block font-medium">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                        class="mt-1 block w-full border rounded p-2" step="0.01">
                    @error('price')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Stock --}}
                <div>
                    <label for="stock" class="block font-medium">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                        class="mt-1 block w-full border rounded p-2">
                    @error('stock')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
