<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-100 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen text-gray-100">
        <div class="form-container bg-gray-900 mx-auto rounded-lg shadow-2xl px-8 py-10 max-w-3xl">
            <div class="form-header text-white text-center text-3xl font-semibold mb-8">Add a New Post</div>

            @if (session('success'))
                <div class="alert alert-success bg-green-600 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger bg-red-600 text-white p-4 rounded-lg mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tbl_post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Category Dropdown -->
                <div class="mb-6">
                    <label for="cat" class="form-label text-gray-400 text-lg">Category</label>
                    <select class="form-control bg-gray-800 border border-gray-700 text-white text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full p-3" id="cat" name="cat" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->name }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="title" class="form-label text-gray-400 text-lg">Title</label>
                    <input type="text" class="form-control bg-gray-800 border border-gray-700 text-white text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full p-3" id="title" name="title" placeholder="Enter title" required>
                </div>

                <div class="mb-6">
                    <label for="body" class="form-label text-gray-400 text-lg">Body</label>
                    <textarea class="form-control bg-gray-800 border border-gray-700 text-white text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full p-3" id="body" name="body" rows="6" placeholder="Enter body text" required></textarea>
                </div>

                <div class="mb-6">
                    <label for="image" class="form-label text-gray-400 text-lg">Image</label>
                    <input type="file" class="form-control bg-gray-800 border border-gray-700 text-white text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full p-3" id="image" name="image">
                </div>

                <div class="mb-6">
                    <label for="tags" class="form-label text-gray-400 text-lg">Tags</label>
                    <input type="text" class="form-control bg-gray-800 border border-gray-700 text-white text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full p-3" id="tags" name="tags" placeholder="Enter tags (comma-separated)">
                </div>

                <div class="mb-6">
                    <label for="date" class="form-label text-gray-400 text-lg">Date</label>
                    <input type="date" class="form-control bg-gray-800 border border-gray-700 text-white text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full p-3" id="date" name="date" required>
                </div>

                <button type="submit" class="btn btn-primary w-full bg-purple-600 border-none text-white hover:bg-purple-700 rounded-lg py-3 text-lg focus:outline-none focus:ring-4 focus:ring-purple-500 transition-all">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
