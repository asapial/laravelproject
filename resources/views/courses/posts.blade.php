
    <div class="container mx-auto py-8">
        <!-- Course Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">{{ $course->name }}</h1>
        <p class="text-center text-gray-600 mb-10">{{ $course->description }}</p>

        <!-- Posts -->
        @if($posts->isEmpty())
            <p class="text-center text-gray-500">No posts available for this course.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <h2 class="text-lg font-bold text-gray-800">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-600 mb-4">by {{ $post->author }} on {{ \Carbon\Carbon::parse($post->date)->format('M d, Y') }}</p>
                            <p class="text-gray-700 mb-4">{{ Str::limit($post->body, 100, '...') }}</p>
                            <a href="{{ route('post.show', $post->id) }}" class="text-indigo-600 hover:underline">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
