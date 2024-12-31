<x-app-layout>
    <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12">
        <div class="container mx-auto text-gray-200">
            <!-- Course Title -->
            <h1 class="text-4xl font-extrabold text-center text-white mb-6">
                {{ $course->name }}
            </h1>
            <p class="text-lg text-center text-gray-400 mb-10">
                {{ $course->description }}
            </p>

            <!-- Posts Section -->
            @if($posts->isEmpty())
                <p class="text-center text-gray-500 text-lg">No posts found for this course.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <div class="bg-gradient-to-tr from-gray-700 via-gray-800 to-gray-900 shadow-lg rounded-xl overflow-hidden transition-transform transform hover:scale-105">
                            <div class="p-6">
                                <h5 class="text-xl font-bold text-white mb-2">
                                    {{ $post->title }}
                                </h5>
                                <p class="text-gray-300 mb-4">
                                    {{ Str::limit($post->body, 100) }}
                                </p>
                                <small class="text-sm text-gray-500 block mb-4">
                                    By {{ $post->author }} on {{ \Carbon\Carbon::parse($post->date)->format('M d, Y') }}
                                </small>
                                <div class="flex justify-between items-center">
                                    <a href="#" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded-lg shadow-md transition duration-300 text-sm">
                                        View
                                    </a>
                                    @if(auth()->user()->id == $post->user_id)
                                        <div class="flex space-x-2">
                                            <a href="{{ route('post.edit', $post->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-4 rounded-lg shadow-md transition duration-300 text-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-500 text-white py-2 px-4 rounded-lg shadow-md transition duration-300 text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
