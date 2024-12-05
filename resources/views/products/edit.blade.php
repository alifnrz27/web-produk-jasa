@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow-xl">
    <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Edit Produk</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block text-lg font-medium text-gray-700">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-lg font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="editor" placeholder="Masukkan deskripsi produk">{{ old('description', $product->description) }}</textarea>
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
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div class="mb-6">
            <label for="image" class="block text-lg font-medium text-gray-700">Gambar Produk</label>
            @if($product->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-64 h-64 object-cover mb-2 mx-auto" id="current-image-preview">
                    <p class="text-gray-500 text-sm text-center">Gambar Saat Ini</p>
                </div>
            @endif
            <input type="file" name="image" id="image" class="w-full p-4 mt-2 border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" onchange="previewImage(event)">
            
            <div class="mt-4" id="image-preview-container" style="display: none;">
                <img id="image-preview" src="" alt="Image Preview" class="w-64 h-64 object-cover mb-2 mx-auto">
                <p class="text-gray-500 text-sm text-center">Preview Gambar Baru</p>
            </div>
        </div>

        <div class="flex justify-between items-center mt-8">
            <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">Perbarui</button>
            <a href="{{ route('products.index') }}" class="bg-gray-600 text-white px-8 py-4 rounded-md hover:bg-gray-700 transition duration-300 transform hover:scale-105">Kembali</a>
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
