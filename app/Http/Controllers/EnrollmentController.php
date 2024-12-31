<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Store a newly created enrollment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = Auth::user();
        $courseId = $request->course_id;

        // Check if user is already enrolled in the course
        if (Enrollment::where('user_id', $user->id)->where('course_id', $courseId)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        // Create a new enrollment
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
        ]);

        return redirect()->route('dashboard')->with('success', 'Successfully enrolled in the course.');
    }
}
