{{-- <x-app-layout></x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #e0e0e0; /* Light text for contrast */
        }
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: #1e1e1e; /* Dark card background */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7); /* Premium shadow effect */
            padding: 30px;
            border: 1px solid #333; /* Subtle border for premium feel */
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 1.8rem;
            color: #f5f5f5; /* Premium header color */
            letter-spacing: 0.5px;
        }
        .form-label {
            font-weight: 500;
            color: #b0b0b0; /* Subtle label text color */
        }
        .form-control {
            background-color: #292929; /* Input background */
            color: #ffffff; /* Input text color */
            border: 1px solid #444; /* Border for inputs */
        }
        .form-control:hover {
            background-color: #292929;
            color: #ffffff; 
            border-color: #6200ea; /* Premium purple focus */
            box-shadow: 0 0 5px #6200ea;
        }
        .btn-primary {
            background-color: #6200ea; /* Premium purple button */
            border-color: #6200ea;
        }
        .btn-primary:hover {
            background-color: #7e57c2; /* Lighter purple on hover */
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">Add a New Post</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tbl_post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="cat" class="form-label">Category</label>
                <input type="text" class="form-control" id="cat" name="cat" placeholder="Enter category" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter body text" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags (comma-separated)">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</body>
</html>
{{-- </x-app-layout> --}}