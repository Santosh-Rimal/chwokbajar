<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blogs') }}
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

                    <!-- Add Blog Button -->
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4"
                        href="{{ route('admin.blogs.create') }}">Add Blog</a>

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Image</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <img class="w-16 h-16 rounded object-cover"
                                            src="{{ asset('admin/assets/images/blog/' . $blog->image) }}"
                                            alt="Image">
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $blog->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a class="text-blue-600 hover:text-blue-900"
                                            href="{{ route('admin.blogs.edit', $blog->id) }}">Edit</a>

                                        <!-- Delete Form -->
                                        <form class="inline-block"
                                            action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
