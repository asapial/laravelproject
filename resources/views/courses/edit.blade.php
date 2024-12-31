<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen text-gray-100">
        <div class="max-w-4xl mx-auto py-12 px-6 lg:px-8">
            <div class="bg-gray-900 shadow-lg rounded-lg p-8">
                <h1 class="text-center text-2xl font-bold text-white mb-6">Edit Course</h1>

                <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Course Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Course Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $course->name) }}" 
                            class="mt-2 w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-gray-100 placeholder-gray-400 focus:ring focus:ring-blue-500 focus:outline-none focus:border-blue-500" 
                            placeholder="Enter course name" 
                            required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300">Course Description</label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="5" 
                            class="mt-2 w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-md text-gray-100 placeholder-gray-400 focus:ring focus:ring-blue-500 focus:outline-none focus:border-blue-500" 
                            placeholder="Enter course description" 
                            required>{{ old('description', $course->description) }}</textarea>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-between">
                        <a href="{{ route('courses.index') }}" 
                           class="px-4 py-2 bg-yellow-500 text-gray-900 font-bold rounded-md hover:bg-yellow-600 transition">
                            Back
                        </a>
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500 transition">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
