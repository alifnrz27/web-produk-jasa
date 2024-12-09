@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Hasil Pencarian untuk "{{ $search }}"</h1>

        @if ($products->isEmpty())
            <p class="text-gray-500 text-lg">Tidak ada produk ditemukan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg mb-4">
                        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-4">IDR {{ number_format($product->price, 2) }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('products.show', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 font-semibold transition duration-300 transform hover:scale-105">Lihat</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 font-semibold transition duration-300 transform hover:scale-105">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" id="delete-btn-{{ $product->id }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 font-semibold transition duration-300 transform hover:scale-105">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition duration-300 transform hover:scale-105">Kembali</a>
        </div>
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
