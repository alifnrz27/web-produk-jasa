@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Tentang Kami</h1>
                <p class="mt-4 text-lg text-gray-600">Kami adalah perusahaan yang berkomitmen untuk memberikan pengalaman belanja terbaik kepada pelanggan kami. Berikut adalah sedikit informasi tentang kami dan misi kami untuk menghadirkan produk terbaik.</p>
            </div>

            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="relative">
                    <img src="{{ asset('img/logo.png') }}" alt="Tentang Kami" class="w-full h-full object-cover rounded-xl shadow-lg">
                    <div class="absolute inset-0 bg-black opacity-30 rounded-xl"></div>
                </div>

                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-semibold text-gray-800">Visi dan Misi</h2>
                    <p class="mt-4 text-lg text-gray-600">Kami berkomitmen untuk menyediakan produk berkualitas tinggi dengan harga terjangkau dan layanan pelanggan yang luar biasa. Dengan platform yang ramah pengguna, kami ingin membuat belanja online menjadi mudah, aman, dan menyenangkan untuk semua orang.</p>

                    <h3 class="mt-8 text-2xl font-semibold text-gray-800">Misi Kami</h3>
                    <ul class="mt-4 space-y-3 text-lg text-gray-600">
                        <li class="flex items-center">
                            <i class="fa-solid fa-person"></i> Menyediakan produk berkualitas dengan harga yang bersaing.
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-person"></i> Memberikan layanan pelanggan yang responsif dan ramah.
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-person"></i> Menyediakan pengalaman belanja online yang mudah dan menyenangkan.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-16 text-center">
                <h2 class="text-3xl font-semibold text-gray-800">Tim Kami</h2>
                <p class="mt-4 text-lg text-gray-600">Kami bekerja dengan tim yang berdedikasi tinggi untuk memberikan layanan terbaik. Berikut adalah beberapa orang hebat di balik kesuksesan kami.</p>

                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Tim 1" class="mx-auto w-32 h-32 rounded-full object-cover mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">Alif</h3>
                        <p class="text-gray-600">Blog</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('img/data.png') }}" alt="Tim 2" class="mx-auto w-32 h-32 rounded-full object-cover mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">Alecya</h3>
                        <p class="text-gray-600">Product</p>
                    </div>

                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Tim 3" class="mx-auto w-32 h-32 rounded-full object-cover mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">Fiqih</h3>
                        <p class="text-gray-600">Jasa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
