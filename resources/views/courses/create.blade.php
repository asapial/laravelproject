<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Add Course') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen text-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto bg-gray-900 shadow-lg rounded-lg p-8">
                <h2 class="text-center text-2xl font-bold text-white mb-6">Add New Course</h2>

                @if (session('success'))
                    <div class="alert alert-success text-green-400 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-red-400 bg-red-800 bg-opacity-50 p-4 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-400 font-medium mb-2">Course Name</label>
                        <input 
                            type="text" 
                            class="form-control bg-gray-800 border border-gray-700 text-white rounded-lg focus:ring-purple-500 focus:border-purple-500 w-full" 
                            id="name" 
                            name="name" 
                            placeholder="Enter course name" 
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-400 font-medium mb-2">Description</label>
                        <textarea 
                            class="form-control bg-gray-800 border border-gray-700 text-white rounded-lg focus:ring-purple-500 focus:border-purple-500 w-full" 
                            id="description" 
                            name="description" 
                            rows="4" 
                            placeholder="Enter course description"></textarea>
                    </div>

                    <button 
                        type="submit" 
                        class="btn w-full bg-purple-600 text-white font-semibold py-2 rounded-lg hover:bg-purple-700 focus:ring-4 focus:ring-purple-500">
                        Add Course
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
