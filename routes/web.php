<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('index');
// });

// route for home 

Route::get('/', [postcontroller::class, 'showTopics']);

// route for home 
// ------------------------------------------------------------------------------------------------
// route for dashboard 

use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
});

// route for dashboard 
// ------------------------------------------------------------------------------------------------
// route for addpost

use App\Http\Controllers\TblPostController;

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [TblPostController::class, 'create'])->name('post.addpost');
    Route::post('/posts', [TblPostController::class, 'store'])->name('tbl_post.store');
});


// route for addpost
// ------------------------------------------------------------------------------------------------
// route for showpost

Route::middleware(['auth'])->group(function () {
    Route::get('/my-posts', [TblPostController::class, 'index'])->name('post.index');
    Route::delete('/posts/{id}', [TblPostController::class, 'destroy'])->name('tbl_post.destroy');
    Route::get('/posts/{id}/edit', [TblPostController::class, 'edit'])->name('tbl_post.edit');
    Route::post('/posts/{id}/update', [TblPostController::class, 'update'])->name('tbl_post.update');
});

// route for showpost
// ------------------------------------------------------------------------------------------------
// route for add course

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// route for add course
// ------------------------------------------------------------------------------------------------
// route for show course

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');

Route::get('/courses/{id}', [CourseController::class, 'showCoursePosts'])->name('courses.posts');


// route for show course
// ------------------------------------------------------------------------------------------------
// route for exam controll

use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\ExamManagementController;


Route::prefix('exams')->middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/create', [ExamManagementController::class, 'create'])->name('admin.exams.create');
    Route::post('/store', [ExamManagementController::class, 'store'])->name('admin.exams.store');
});

// route for exam controll
// ------------------------------------------------------------------------------------------------


Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
});

// routes for enrollments 

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware(['auth'])->group(function () {
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// this route is for logout 
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/editor', function () {
    return view('editorPanel.editor');
});

require __DIR__.'/auth.php';
