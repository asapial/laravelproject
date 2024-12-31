<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TblPost;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function create()
    {
        // Check if the logged-in user is an admin
        if (auth()->user()->usertype !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized access!');
        }

        return view('courses.create');
    }

    public function store(Request $request)
    {
        // Check if the logged-in user is an admin
        if (auth()->user()->usertype !== 'admin') {
            return redirect('dashboard')->with('error', 'Unauthorized access!');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('courses.create')->with('success', 'Course added successfully!');
    }

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function showCoursePosts($courseId)
    {
        $user = Auth::user();

        // Check if the logged-in user is enrolled in the course
        $isEnrolled = Enrollment::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->exists();

        if (!$isEnrolled) {
            return redirect()->route('dashboard')->with('error', 'You are not enrolled in this course.');
        }

        // Get the course details and its category name
        $course = Course::find($courseId);

        if (!$course) {
            return redirect()->route('dashboard')->with('error', 'Course not found.');
        }

        $categoryName = $course->name;

        // Fetch posts from `tbl_post` matching the course's category
        $posts = TblPost::where('cat', $categoryName)->get();

        // Pass posts and course details to the view
        return view('courses.posts', compact('posts', 'course'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
    
        // Check if the user is enrolled in the course
        $user = Auth::user();
        // if (!Enrollment::where('user_id', $user->id)->where('course_id', $course->id)->exists()) {
        //     return redirect()->route('dashboard')->with('error', 'You are not enrolled in this course.');
        // }
        
        // Redirect to home page if the user is not logged in
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to access this course.');
    }

    // Check if the user is enrolled in the course
    if (!Enrollment::where('user_id', $user->id)->where('course_id', $course->id)->exists()) {
        return redirect()->route('dashboard')->with('error', 'You are not enrolled in this course.');
    }
        // Fetch posts based on the category of the course
        $posts = TblPost::where('cat', $course->name)->get();
    
        return view('courses.show', compact('course', 'posts'));
    }
}
