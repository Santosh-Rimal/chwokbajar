<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="title">{{ __('Title') }}</label>
                            <input
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                id="title" type="text" name="title" value="{{ old('title', $about->title) }}"
                                required>
                            @error('title')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="slogan">{{ __('Slogan') }}</label>
                            <input
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                id="slogan" type="text" name="slogan"
                                value="{{ old('slogan', $about->slogan) }}">
                            @error('slogan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="description">{{ __('Description') }}</label>
                            <textarea
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                id="description" name="description" rows="4" required>{{ old('description', $about->description) }}</textarea>
                            @error('description')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="image">{{ __('Image') }}</label>
                            <input
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                id="image" type="file" name="image">
                            @if ($about->image)
                                <img class="mt-2 w-32 h-32 object-cover"
                                    src="{{ asset('admin/assets/images/about/' . $about->image) }}"
                                    alt="Current Image">
                            @endif
                            @error('image')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button
                                class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                type="submit">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
