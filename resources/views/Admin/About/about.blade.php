<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Display Success Message -->
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <button class="absolute top-0 bottom-0 right-0 px-4 py-3"
                                onclick="this.parentElement.style.display='none';">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M14.348 5.652a1 1 0 011.415 0l.035.035a1 1 0 010 1.415L11.414 11l4.384 4.383a1 1 0 01-1.414 1.414L10 12.414l-4.384 4.383a1 1 0 01-1.414-1.414L8.586 11 4.202 6.616a1 1 0 011.414-1.414L10 9.586l4.348-4.348z" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    <!-- Create Button -->
                    <div class="mb-4">
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            href="{{ route('admin.abouts.create') }}">
                            Create New Entry
                        </a>
                    </div>

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <!-- Table Headers -->
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    scope="col">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    scope="col">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    scope="col">Slogan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    scope="col">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    scope="col">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($abouts as $about)
                                <tr>
                                    <!-- Image -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <img class="w-16 h-16 rounded object-cover"
                                            src="{{ $about->image ? asset('admin/assets/images/about/' . $about->image) : asset('images/default-image.jpg') }}"
                                            alt="{{ $about->title }} Image">
                                    </td>

                                    <!-- Title -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $about->title }}
                                    </td>

                                    <!-- Slogan -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $about->slogan }}
                                    </td>

                                    <!-- Description (limited to 100 characters) -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ Str::limit($about->description, 100) }}
                                    </td>

                                    <!-- Created At -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $about->created_at->format('Y-m-d H:i') }}
                                    </td>

                                    <!-- Actions (Edit/Delete) -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <!-- Edit Button -->
                                        <a class="text-blue-600 hover:text-blue-900"
                                            href="{{ route('admin.abouts.edit', $about->id) }}">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form class="inline-block"
                                            action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $abouts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
