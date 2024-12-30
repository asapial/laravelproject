<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 800px;
            margin: 60px auto;
            background: linear-gradient(145deg, #1e1e1e, #252525);
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.6);
            padding: 40px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
            font-size: 1.8rem;
            color: #ffffff;
        }
        .form-label {
            color: #bbbbbb;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .form-control {
            background-color: #2a2a2a;
            color: #e0e0e0;
            border: 1px solid #444;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.6);
        }
        .btn-primary {
            background: linear-gradient(145deg, #3b82f6, #2563eb);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(145deg, #2563eb, #1d4ed8);
        }
        .alert {
            border-radius: 8px;
        }
        textarea#body {
            height: 250px;
            resize: none;
        }
    </style>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#body',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table wordcount',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | outdent indent | link image media | emoticons charmap',
            content_css: 'dark',
            skin: 'oxide-dark',
            height: 300
        });
    </script> --}}
</head>
<body>
    <div class="form-container">
        <div class="form-header">Edit Post</div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tbl_post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="cat" class="form-label">Category</label>
                <input type="text" class="form-control" id="cat" name="cat" value="{{ $post->cat }}" required>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" name="body">{{ $post->body }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" value="{{ $post->tags }}">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $post->date }}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Post</button>
        </form>
    </div>
</body>
</html>
