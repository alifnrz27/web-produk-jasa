@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-xl">
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Tambah Produk</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama produk" class="w-full p-4 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" placeholder="Masukkan deskripsi produk" class="w-full p-4 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
            </div>

            <div class="mb-6">
                <label for="price" class="block text-lg font-medium text-gray-700">Harga</label>
                <input type="number" name="price" id="price" placeholder="Masukkan harga produk" class="w-full p-4 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-lg font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="image" id="image" class="w-full p-4 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">Tambah</button>
                <a href="{{ route('products.index') }}" class="w-full sm:w-auto bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition duration-300 transform hover:scale-105 text-center">Kembali</a>
            </div>
        </form>
    </div>
@endsection
