<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
    
                    <!-- Welcome Message -->
                    <h3 class="text-2xl font-bold mb-6 text-gray-100">Welcome, {{ $user->name }}</h3>
    
                    <!-- Enrolled Courses -->
                    <div class="mb-12">
                        <h4 class="text-xl font-semibold text-gray-400 mb-4">Enrolled Courses</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            @forelse ($enrolledCourses as $enrollment)
                                <a href="{{ route('courses.show', $enrollment->course->id) }}"
                                    class="relative bg-gradient-to-tr from-blue-500 via-indigo-600 to-purple-700 hover:from-purple-700 hover:to-blue-500 p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 ease-in-out text-center">
                                    <h5 class="text-lg font-semibold text-white">{{ $enrollment->course->name }}</h5>
                                    <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-yellow-400 to-pink-500"></div>
                                </a>
                            @empty
                                <p class="text-gray-400 text-center">You are not enrolled in any courses yet.</p>
                            @endforelse
                        </div>
                    </div>
    
                    <!-- Available Courses -->
                    <div>
                        <h4 class="text-xl font-semibold text-gray-400 mb-4">Available Courses</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            @forelse ($availableCourses as $course)
                                <div class="relative bg-gradient-to-br from-gray-700 via-gray-800 to-gray-900 hover:from-gray-800 hover:to-gray-700 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                                    <h5 class="text-lg font-medium text-white text-center mb-4">{{ $course->name }}</h5>
                                    <form method="POST" action="{{ route('enrollments.store') }}" class="text-center">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg font-semibold shadow-md transition duration-300">
                                            Enroll
                                        </button>
                                    </form>
                                    <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-yellow-400 to-pink-500"></div>
                                </div>
                            @empty
                                <p class="text-gray-400 text-center">No courses available for enrollment.</p>
                            @endforelse
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>