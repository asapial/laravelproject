<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Course List') }}
        </h2>
    </x-slot>

    <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen text-gray-100">
        <div class="max-w-7xl mx-auto mt-10 bg-gray-900 shadow-lg rounded-lg p-8">
            <h1 class="text-center text-3xl font-bold text-white mb-6">Course List</h1>

            @if(session('success'))
                <div class="alert alert-success text-green-400 bg-green-800 bg-opacity-50 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($courses->isEmpty())
                <p class="text-center text-gray-400">No courses available.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="table table-dark table-hover border border-gray-700 rounded-lg w-full">
                        <thead>
                            <tr class="bg-gray-800 text-gray-300">
                                <th class="px-6 py-4">#</th>
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Description</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr class="border-b border-gray-700 hover:bg-gray-800">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $course->name }}</td>
                                    <td class="px-6 py-4">{{ $course->description }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('courses.edit', $course->id) }}" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-500">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-500"
                                                onclick="return confirm('Are you sure you want to delete this course?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
