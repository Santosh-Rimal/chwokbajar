@extends('layout.Frontend.master')

@section('content')
    <div class="container mx-auto py-12 px-4">
        <!-- Single Blog Post Section -->
        <div class="single-blog bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-4xl font-bold mb-6">{{ $blog->title }}</h3>

            @if ($blog->image)
                <img class="w-full h-auto mb-6" src="{{ asset('admin/assets/images/blog/' . $blog->image) }}"
                    alt="{{ $blog->title }}">
            @endif

            <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                {{ $blog->description }}
            </p>

            <div class="text-sm text-gray-500 dark:text-gray-400">
                <span>Published on: {{ $blog->created_at->format('M d, Y') }}</span>
                <span class="ml-4">Author: {{ $blog->author }}</span>
            </div>
        </div>
    </div>
@endsection

@section('title')
    {{ $blog->title }}
@endsection
