@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container mx-auto p-6">
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 mb-6 inline-block text-lg font-semibold transition duration-300 transform hover:scale-105">Tambah Produk</a>

        @if($products->isEmpty())
            <p class="text-center text-gray-500 text-xl">Tidak ada produk tersedia.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                        <div class="relative mb-4">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg mb-4">
                        </div>

                        <a href="{{ route('products.show', $product->id) }}" class="text-2xl font-semibold text-blue-600 hover:text-blue-700 hover:underline transition duration-300">{{ $product->name }}</a>
                        <p class="text-gray-600 mt-2 text-lg font-medium">IDR {{ number_format($product->price, 2) }}</p>

                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('products.show', $product->id) }}" class="w-20 bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 text font-semibold transition duration-300 transform hover:scale-105 mb-2 mr-2">Lihat</a>

                            <div class="w-full flex space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="w-20 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 text-center font-semibold transition duration-300 transform hover:scale-105 mb-2">Edit</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" id="delete-btn-{{ $product->id }}" class="w-20 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 font-semibold transition duration-300 transform hover:scale-105 mb-2">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            @foreach ($products as $product)
                document.getElementById('delete-btn-{{ $product->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Produk ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-{{ $product->id }}').submit();
                        }
                    });
                });
            @endforeach
        </script>

        @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    showConfirmButton: true,
                    reverseButtons: true

                });
            });
        </script>
        @endif
    @endpush
@endsection
