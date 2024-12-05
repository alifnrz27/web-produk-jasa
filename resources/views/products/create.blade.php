@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 shadow-xl">
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Tambah Produk</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama produk" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="editor" placeholder="Masukkan deskripsi produk" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
                <script>    
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log('Editor siap:', editor);
                        })
                        .catch(error => {
                            console.error('Terjadi kesalahan:', error);
                        });
                </script>
            </div>

            <div class="mb-6">
                <label for="price" class="block text-lg font-medium text-gray-700">Harga</label>
                <input type="number" name="price" id="price" placeholder="Masukkan harga produk" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-lg font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="image" id="image" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" onchange="previewImage(event)">
                
                <div class="mt-4" id="image-preview-container" style="display: none;">
                    <img id="image-preview" src="" alt="Image Preview" class="w-48 max-w-xs mt-2">
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">Tambah</button>
                <a href="{{ route('products.index') }}" class="w-full sm:w-auto bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition duration-300 transform hover:scale-105 text-center">Kembali</a>
            </div>
        </form>
    </div> 
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewContainer = document.getElementById('image-preview-container');
                const imagePreview = document.getElementById('image-preview');

                imagePreview.src = e.target.result;
                previewContainer.style.display = 'block'; 
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
