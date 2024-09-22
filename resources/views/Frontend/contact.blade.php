@extends('layout.Frontend.master')

@section('content')
    <!-- Contact Form -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-2xl font-bold mb-4">Contact Us</h3>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium" for="name">Name</label>
                    <input class="w-full p-2 border rounded-md" id="name" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium" for="email">Email</label>
                    <input class="w-full p-2 border rounded-md" id="email" type="email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium" for="message">Message</label>
                    <textarea class="w-full p-2 border rounded-md" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('title')
    Contact Us
@endsection
