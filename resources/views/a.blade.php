@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Dashboard</h1>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- User Profile -->
    <h2>Profile Information</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (Leave blank to keep unchanged):</label>
            <input type="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

    <!-- Enrolled Courses -->
    <h2>Enrolled Courses</h2>
    <ul>
        @forelse ($enrollments as $enrollment)
            <li>{{ $enrollment->course->name }}</li>
        @empty
            <p>No courses enrolled.</p>
        @endforelse
    </ul>
</div>
@endsection
