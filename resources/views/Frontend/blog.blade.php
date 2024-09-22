@extends('layout.Frontend.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Blogs Section -->
            @if ($blogs->count())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-3xl font-bold mb-4">Latest Blogs</h3>
                        @foreach ($blogs as $blog)
                            <div class="mb-6">
                                <h4 class="text-2xl font-bold">{{ $blog->title }}</h4>
                                <p class="mt-2">{{ Str::limit($blog->description, 150) }}</p>
                                @if ($blog->image)
                                    <img class="mt-4" src="{{ asset('admin/assets/images/blog/' . $blog->image) }}"
                                        alt="{{ $blog->title }}">
                                @endif
                                <a class="text-blue-500" href="{{ route('blogs.show', $blog->id) }}">Read more</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Contact Form -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Contact Us</h3>
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium" for="name">Name</label>
                            <input class="w-full p-2 border rounded-md" id="name" type="text" name="name">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium" for="email">Email</label>
                            <input class="w-full p-2 border rounded-md" id="email" type="email" name="email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium" for="message">Message</label>
                            <textarea class="w-full p-2 border rounded-md" id="message" name="message" rows="4"></textarea>
                        </div>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-md" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Our Blogs
@endsection
