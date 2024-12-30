<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            font-weight: 600;
            background: linear-gradient(90deg, #6200ea, #03dac5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
        }

        .card {
            background-color: #1e1e1e;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5), inset 0 0 8px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.6);
        }

        .card-title, .card-text, .text-muted {
            color: #e0e0e0;
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(90deg, #6200ea, #3700b3);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #3700b3, #6200ea);
            opacity: 0.95;
        }

        .btn-danger {
            background: linear-gradient(90deg, #d32f2f, #b71c1c);
            border: none;
        }

        .btn-danger:hover {
            background: linear-gradient(90deg, #b71c1c, #d32f2f);
            opacity: 0.95;
        }

        .alert-success {
            background-color: #2e7d32;
            border: none;
            color: #fff;
            border-radius: 10px;
        }

        .text-center {
            margin-bottom: 30px;
        }

        .custom-card {
        background-color: #1e1e1e;
        border: 1px solid #333;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.6);
    }

    .custom-card-header {
        background: linear-gradient(90deg, #6200ea, #03dac5);
        padding: 15px;
        text-align: center;
    }

    .custom-card-title {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
        color: #fff;
    }

    .custom-card-category {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .custom-card-body {
        padding: 15px;
        color: #e0e0e0;
    }

    .custom-card-text {
        margin-bottom: 10px;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .custom-card-date {
        font-size: 0.85rem;
        color: #888;
    }

    .custom-card-footer {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        background-color: #121212;
        border-top: 1px solid #333;
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(90deg, #6200ea, #3700b3);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #3700b3, #6200ea);
        opacity: 0.95;
    }

    .btn-danger {
        background: linear-gradient(90deg, #d32f2f, #b71c1c);
        border: none;
    }

    .btn-danger:hover {
        background: linear-gradient(90deg, #b71c1c, #d32f2f);
        opacity: 0.95;
    }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">My Posts</h1>
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($posts->isEmpty())
            <p class="text-center">You have no posts yet.</p>
        @else
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        {{-- <div class="custom-card">
                            <div class="custom-card-header">
                                <h5 class="custom-card-title">{{ $post->title }}</h5>
                                <p class="custom-card-category">{{ $post->cat }}</p>
                            </div>
                            <div class="custom-card-body">
                                <p class="custom-card-text">{{ Str::limit($post->body, 100) }}</p>
                                <p class="custom-card-date">Date: {{ $post->date }}</p>
                            </div>
                            <div class="custom-card-footer">
                                <a href="{{ route('tbl_post.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tbl_post.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        </div> --}}

                        <div class="custom-card">
                            <div class="custom-card-header">
                                <h5 class="custom-card-title">{{ $post->title }}</h5>
                                <p class="custom-card-category">{{ $post->cat }}</p>
                            </div>
                            <div class="custom-card-body">
                                <p class="custom-card-text">
                                    {{ Str::limit($post->body, 250) }} 
                                </p>
                                <div class="custom-card-details">
                                    <span class="custom-card-detail"><strong>Category:</strong> {{ $post->cat }}</span>
                                    <span class="custom-card-detail"><strong>Date:</strong> {{ $post->date }}</span>
                                </div>
                            </div>
                            <div class="custom-card-footer">
                                <a href="{{ route('tbl_post.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tbl_post.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        
                        
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
