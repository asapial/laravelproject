<?php

namespace App\Http\Controllers;

use App\Models\Course; // Import the Course model
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();

        // Get courses the user is enrolled in
        $enrolledCourses = Enrollment::with('course')->where('user_id', $user->id)->get();

        // Get available courses
        $enrolledCourseIds = $enrolledCourses->pluck('course_id');
        $availableCourses = Course::whereNotIn('id', $enrolledCourseIds)->get();

        return view('dashboard', compact('user', 'enrolledCourses', 'availableCourses'));
    }
}
