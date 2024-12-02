@extends('layouts.dashboard-layout')
@section('content')
    @php
        $title = "Blog";
        $has_error = $errors->any();
    @endphp
    <div class="relative w-full">
        @php
            $tabs = [
                [
                    'active' => !$has_error,
                    'target' => 'content_1',
                    'title' => $title,
                    'icon' => 'fas fa-home',
                ],
            ];
        @endphp

        @include('components.tabs', [
            'tabs' => $tabs,
        ])

        <div class="">
            <div id="content_1" role="tabpanel"
                class="max-w-full transition-all {{ !$has_error ? '' : 'hidden' }}  tab-contents p-4 lg:p-8 bg-white mt-4 !rounded-box">
                <h1 class="text-xl lg:text-3xl font-bold mb-8">{{ $title }}</h1>
                @include('blogs.table')
            </div>
        </div>
    </div>
@endsection