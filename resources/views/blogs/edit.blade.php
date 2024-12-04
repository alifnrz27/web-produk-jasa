@extends('layouts.dashboard-layout')
@section('content')
<form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col w-full p-6">
        <div class="flex flex-col mb-4">
            <label for="title" class="block text-gray-700">Judul:</label>
            <input type="text" name="title" id="title" class="border rounded p-2" placeholder="Masukkan judul blog" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="slug" class="block text-gray-700">Slug:</label>
            <input type="text" name="slug" id="slug" class="border rounded p-2" placeholder="Masukkan slug blog (opsional)" value="{{ old('slug', $blog->slug) }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="content" class="block text-gray-700">Isi:</label>
            <textarea id="editor" name="content">{{ old('content', $blog->content) }}</textarea>

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
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="mb-2 max-w-xs">
            @else
                <p class="text-gray-500">Tidak ada gambar.</p>
            @endif
            <input type="file" name="image" id="image" class="border rounded p-2">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
        </div>
    </div>
</form>
@endsection
