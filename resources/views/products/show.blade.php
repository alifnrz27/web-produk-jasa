@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <div class="bg-white p-8 shadow-lg max-w-4xl mx-auto mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-1">
            <div class="text-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-contain rounded-lg mb-6 shadow-lg">
                @else
                    <p class="text-gray-500">Tidak ada gambar tersedia</p>
                @endif
            </div>

            <div class="space-y-6">
                <h1 class="text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p class="text-gray-600 text-xl font-semibold">IDR {{ number_format($product->price, 2, ',', '.') }}</p>

                <div class="mb-6">
                    <p class="text-gray-600 text-lg font-medium"><strong>Deskripsi:</strong></p>
                    <p class="text-gray-500 text-lg">{!!$product->description!!}</p>
                </div>

            
                <div class="flex space-x-4 mt-6">
                    <a href="{{ route('products.index') }}" class="w-full bg-gray-600 text-white py-3 rounded-md text-center hover:bg-gray-700 transition duration-300 transform hover:scale-105">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
