<style>
    .btn-enroll {
        background-color: #4caf50;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    .btn-enroll:hover {
        background-color: #45a049;
    }

    .btn-logout {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


    .btn-logout:hover {
        background-color: #d32f2f;
    }

    .course {
        display: flexbox;
        justify-content: center;


    }

    .course h4 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2em;
        text-align: center;
    }

    .topics {
        display: flex;
        flex-direction: row;
    }

    .topicsbox {
        width: 200px;
        height: 250px;
        margin: 10px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5em;
        text-align: center;
    }
    .topicsbox2 {
        width: 200px;
        height: 250px;
        margin: 10px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5em;
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    .topicsbox2 span
    {
        height: 80%;
        margin-top: 10px;

    }

    /* .topicsbox { 
        /* font-size: calc(20px + 18vh);
        line-height: calc(20px + 20vh); */
        /*   text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
            0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
        color: #fccaff; */
        text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
            color: #fff6a9;
        font-family: "Sacramento", cursive;
        text-align: center;
        animation: blink 12s infinite;
        -webkit-animation: blink 12s infinite;
    } */

    @-webkit-keyframes blink {
  20%,
  24%,
  55% {
    color: #111;
    text-shadow: none;
  }

  0%,
  19%,
  21%,
  23%,
  25%,
  54%,
  56%,
  100% {
/*     color: #fccaff;
    text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
      0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092; */
  text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
    color: #fff6a9;
  }
}

@keyframes blink {
        20%,
        24%,
        55% {
            color: #111;
            text-shadow: none;
        }

        0%,
        19%,
        21%,
        23%,
        25%,
        54%,
        56%,
        100% {
        /*     color: #fccaff;
            text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
            0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092; */
        text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
            color: #fff6a9;
        }
        }




</style>

{{-- /* update massage for successfull enroll  */ --}}
@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Welcome Message -->
                    <h3 class="text-lg font-bold mb-4">Welcome, {{ $user->name }}</h3>

                    <!-- Enrolled Courses -->
                    <div class="course">
                        <h4 class="text-md font-semibold mt-6 mb-2">Enrolled Courses</h4>
                        <div class="topics">
                            @forelse ($enrolledCourses as $enrollment)
                                <a href="{{ route('courses.show', $enrollment->course->id) }}"
                                    class="topicsbox">{{ $enrollment->course->name }}</span>
                                    <!-- Optional: Add more content about the course here, e.g., a short description -->
                                </a>
                            @empty
                                <p>You are not enrolled in any courses yet.</p>
                            @endforelse
                        </div>
                    </div>



                    <!-- Available Courses -->

                    <div class="course">
                        <h4 class="text-md font-semibold mt-6 mb-2">Available Courses</h4>
                        <div class="topics">
                            @forelse ($availableCourses as $course)
                                <div class="topicsbox2">
                                    <span>{{ $course->name }}</span>
                                    <form method="POST" action="{{ route('enrollments.store') }}" class="inline">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit" class="btn-enroll">Enroll</button>
                                    </form>
                                </div>
                            @empty
                                <p>No courses available for enrollment.</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
