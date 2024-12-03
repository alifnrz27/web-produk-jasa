@extends('layouts.dashboard-layout')
@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $blog['title'] }}</h1>

    <p class="text-sm text-gray-500 mb-6"><span class="font-mono text-gray-600">{{ $blog['slug'] }}</span></p>
    
    <div class="mb-6">
        @if($blog['image'])
            <img src="{{ asset('storage/' . $blog['image']) }}" alt="Blog Image" class="w-full h-64 object-contain rounded">
        @else
            <div class="flex items-center justify-center w-full h-64 bg-gray-200 text-gray-500 text-lg rounded">
                Gambar Tidak Ada
            </div>
        @endif
    </div>

    <div class="text-gray-700 leading-relaxed">
        <p class="text-sm text-gray-500 mb-6"><span class="font-mono text-gray-600">{{ $blog['content'] }}</span></p>
    </div>
</div>
@endsection