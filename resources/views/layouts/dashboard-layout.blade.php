<!DOCTYPE html>
@php
    $title = Request::path();
    $title = explode('/', $title);
    $title = $title[0];
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    @yield('styles')
</head>

<body class="antialiased bg-base-100 overflow-hidden">
    {{-- Sidebar --}}
    <main class="flex {{ $title }}">

        {{-- Page --}}
        <section id="main-app" class=" h-screen overflow-y-auto w-full pb-10 m-auto">
            <div class="relative pt-[88px] px-4 lg:px-8">
                @if ($title == 'dashboard')
                    <div
                        class="absolute overflow-hidden top-0 left-0 h-[280px] lg:h-[350px] w-full bg-blue-500 rounded-b-3xl z-0">
                        <img src="{{ asset('image/ribbon.svg') }}" alt=""
                            class="object-cover w-full absolute top-1/2 -translate-y-1/2 left-0 opacity-30">
                        <img src="{{ asset('image/byu-illustration-2.png') }}"
                            class="bottom-4 right-0 w-[150px] lg:w-[300px] absolute lg:-bottom-4 lg:right-10"
                            alt="">
                    </div>
                @else
                    <img src="{{ asset('image/ribbon.svg') }}" alt=""
                        class="object-cover w-full absolute top-1/2 -translate-y-1/2 left-0 opacity-25">
                @endif
                <div class="relative">
                    @yield('content')
                </div>
            </div>
        </section>
    </main>
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"></script>
    @yield('scripts')
</body>

</html>
