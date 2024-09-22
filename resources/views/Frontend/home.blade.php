@extends('layout.Frontend.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Home Section -->
            @if ($homes->count())
                @foreach ($homes as $home)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <h1 class="text-4xl font-bold">{{ $home->title ?? 'Welcome to Our Website!' }}</h1>
                            <p class="text-lg">
                                {{ $home->slogan ?? 'Explore our services and discover more about what we offer.' }}</p>
                            <p>{{ $home->text ?? '' }}</p>
                            @if ($home->image)
                                <img class="mx-auto mt-4" src="{{ asset('admin/assets/images/home/' . $home->image) }}"
                                    alt="{{ $home->title }}">
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- About Section -->
            @if ($abouts->count())
                @foreach ($abouts as $about)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-3xl font-bold">{{ $about->title ?? 'About Us' }}</h2>
                            <p class="text-lg">{{ $about->slogan ?? '' }}</p>
                            <p>{{ $about->description ?? 'Learn more about our story, mission, and values.' }}</p>
                            @if ($about->image)
                                <img class="mt-4" src="{{ asset('admin/assets/images/about/' . $about->image) }}"
                                    alt="{{ $about->title }}">
                            @endif
                        </div>
                    </div>
                @endforeach
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
    Home Page
@endsection
