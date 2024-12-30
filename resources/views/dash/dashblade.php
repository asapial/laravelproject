<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Welcome, {{ $user->name }}</h1>
        <hr>

        <h3>Your Profile</h3>
        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password (optional)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        <hr>

        <h3>Enrolled Courses</h3>
        <ul>
            @forelse ($enrolledCourses as $course)
                <li>
                    <strong>{{ $course->name }}</strong>: {{ $course->description }}
                </li>
            @empty
                <li>You are not enrolled in any courses.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
