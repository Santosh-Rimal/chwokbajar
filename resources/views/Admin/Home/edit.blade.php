<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Home Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="list-disc list-inside text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Edit Home Form -->
                    <form action="{{ route('admin.homes.update', $home->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" id="title" type="text" name="title"
                                value="{{ old('title', $home->title) }}" required>
                        </div>

                        <!-- Slogan Field -->
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input class="form-control" id="slogan" type="text" name="slogan"
                                value="{{ old('slogan', $home->slogan) }}" required>
                        </div>

                        <!-- Text Field -->
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control" id="text" name="text" rows="4">{{ old('text', $home->text) }}</textarea>
                        </div>

                        <!-- Image Field -->
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input class="form-control-file" id="image" type="file" name="image">
                            @if ($home->image)
                                <img class="w-16 h-16 mt-2 rounded object-cover"
                                    src="{{ asset('admin/assets/images/home/' . $home->image) }}" alt="Home Image">
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4">
                            <button
                                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
