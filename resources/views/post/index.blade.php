<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen text-gray-100">
        <div class="container mx-auto mt-12 px-4">
            @if (session('success'))
                <div class="alert alert-success text-white bg-green-500 p-4 rounded-lg shadow-lg mb-6 text-center">{{ session('success') }}</div>
            @endif

            @if ($posts->isEmpty())
                <p class="text-center text-gray-400">You have no posts yet.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts as $post)
                        <div class="custom-card bg-gray-800 border border-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                            <div class="custom-card-header bg-gradient-to-r from-purple-600 to-teal-400 text-center p-4">
                                <h5 class="text-xl font-semibold text-white">{{ $post->title }}</h5>
                                <p class="text-sm text-gray-200">{{ $post->cat }}</p>
                            </div>
                            <div class="custom-card-body p-4 text-gray-200">
                                <p class="text-base mb-4">{{ Str::limit($post->body, 250) }}</p>
                                <div class="text-sm text-gray-400 mb-4">
                                    <span><strong>Category:</strong> {{ $post->cat }}</span>
                                    <br>
                                    <span><strong>Date:</strong> {{ $post->date }}</span>
                                </div>
                            </div>
                            <div class="custom-card-footer flex justify-between items-center bg-gray-900 p-4 border-t border-gray-700">
                                <a href="{{ route('tbl_post.edit', $post->id) }}" class="btn btn-primary bg-gradient-to-r from-purple-600 to-teal-400 text-white py-2 px-4 rounded-lg shadow-md hover:bg-gradient-to-r hover:from-purple-500 hover:to-teal-500">Edit</a>
                                <form action="{{ route('tbl_post.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-gradient-to-r from-red-600 to-red-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-gradient-to-r hover:from-red-500 hover:to-red-600" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

@push('styles')
    <style>
        .custom-card {
            transition: all 0.3s ease;
        }

        .custom-card-header {
            background: linear-gradient(90deg, #6200ea, #03dac5);
            border-radius: 10px 10px 0 0;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #3700b3, #6200ea);
            opacity: 0.95;
        }

        .btn-danger:hover {
            background: linear-gradient(90deg, #b71c1c, #d32f2f);
            opacity: 0.95;
        }
    </style>
@endpush
