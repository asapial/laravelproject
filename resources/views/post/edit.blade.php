<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
        <!-- Form Container -->
        <div class="w-full max-w-2xl bg-gray-800 rounded-xl shadow-2xl p-10">
            <!-- Form Header -->
            <h2 class="text-3xl font-extrabold text-center text-white mb-8">
                Edit Post
            </h2>

            <!-- Error Alerts -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('tbl_post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('POST')

                <div>
                    <label for="cat" class="block text-sm font-semibold text-gray-300 mb-2">Category</label>
                    <input type="text" id="cat" name="cat" value="{{ $post->cat }}" required
                        class="block w-full bg-gray-700 border border-gray-600 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-200 px-4 py-3 placeholder-gray-400">
                </div>

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-300 mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}" required
                        class="block w-full bg-gray-700 border border-gray-600 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-200 px-4 py-3 placeholder-gray-400">
                </div>

                <div>
                    <label for="body" class="block text-sm font-semibold text-gray-300 mb-2">Body</label>
                    <textarea id="body" name="body" rows="6"
                        class="block w-full bg-gray-700 border border-gray-600 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-200 px-4 py-3 placeholder-gray-400 resize-none">{{ $post->body }}</textarea>
                </div>

                <div>
                    <label for="tags" class="block text-sm font-semibold text-gray-300 mb-2">Tags</label>
                    <input type="text" id="tags" name="tags" value="{{ $post->tags }}"
                        class="block w-full bg-gray-700 border border-gray-600 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-200 px-4 py-3 placeholder-gray-400">
                </div>

                <div>
                    <label for="date" class="block text-sm font-semibold text-gray-300 mb-2">Date</label>
                    <input type="date" id="date" name="date" value="{{ $post->date }}" required
                        class="block w-full bg-gray-700 border border-gray-600 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-200 px-4 py-3 placeholder-gray-400">
                </div>

                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-semibold text-lg rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    Update Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
