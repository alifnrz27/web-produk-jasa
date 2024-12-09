@extends('layouts.dashboard-layout')
@section('content')
<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col w-full p-6">
        <div class="flex flex-col mb-4">
            <label for="title" class="block text-gray-700">Judul:</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="border rounded p-2 @error('title') border-red-500 @enderror" 
                placeholder="Masukkan judul blog" 
                value="{{ old('title') }}" 
                >
            @error('title')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col mb-4">
            <label for="slug" class="block text-gray-700">Slug:</label>
            <input 
                type="text" 
                name="slug" 
                id="slug" 
                class="border rounded p-2 @error('slug') border-red-500 @enderror" 
                placeholder="Masukkan slug blog (opsional)" 
                value="{{ old('slug') }}">
            @error('slug')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col mb-4">
            <label for="content" class="block text-gray-700">Isi:</label>
            <textarea 
                id="editor" 
                name="content" 
                class="@error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
            @error('content')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror

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
        <div class="flex flex-col mb-4">
            <label for="image" class="block text-gray-700">Foto (opsional):</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="border rounded p-2 @error('image') border-red-500 @enderror" 
                accept="image/*" 
                onchange="previewImage(event)">
            @error('image')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
            <div id="image-preview" class="mt-4">
                <p class="text-gray-500">Belum ada gambar dipilih.</p>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
        </div>
    </div>
</form>

<script>
    function previewImage(event) {
        const imageInput = event.target;
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = '';
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview Gambar';
                img.className = 'max-w-xs rounded shadow';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(imageInput.files[0]);
        }
    }
</script>
@endsection
