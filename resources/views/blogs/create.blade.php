@extends('layouts.dashboard-layout')
@section('content')
<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col w-full p-6">
        <div class="flex flex-col mb-4">
            <label for="title" class="block text-gray-700">Judul:</label>
            <input type="text" name="title" id="title" class="border rounded p-2" placeholder="Masukkan judul blog" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="slug" class="block text-gray-700">Slug:</label>
            <input type="text" name="slug" id="slug" class="border rounded p-2" placeholder="Masukkan slug blog (opsional)">
        </div>

        <div class="flex flex-col mb-4">
            <label for="content" class="block text-gray-700">Isi:</label>
            <textarea id="editor" name="content"></textarea>

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
            <input type="file" name="image" id="image" class="border rounded p-2">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
        </div>
    </div>
</form>

@endsection