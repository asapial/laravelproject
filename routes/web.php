<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('index');
// });

// route for home 

Route::get('/', [postcontroller::class, 'showTopics']);

// route for home 
// ------------------------------------------------------------------------------------------------
// route for dashboard 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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



// Route::middleware('auth')->group(function () {
//     Route::get('/courses/add', [CourseController::class, 'create'])
//         ->name('courses.create')
//         ->middleware(function ($request, $next) {
//             if (auth()->user()->usertype !== 'admin') {
//                 abort(403, 'Unauthorized access. Only admins can add courses.');
//             }
//             return $next($request);
//         });

//     Route::post('/courses/store', [CourseController::class, 'store'])
//         ->name('courses.store')
//         ->middleware(function ($request, $next) {
//             if (auth()->user()->usertype !== 'admin') {
//                 abort(403, 'Unauthorized access. Only admins can add courses.');
//             }
//             return $next($request);
//         });
// });


// route for add course
// ------------------------------------------------------------------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
});

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

use App\Http\Controllers\AdminController;

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


// routes for add course 

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add-course', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/add-course', [CourseController::class, 'store'])->name('courses.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// this route is for logout 
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
