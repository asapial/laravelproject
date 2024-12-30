<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Topic</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 15px;
            background: #2575fc;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Topic</h1>

        <form action="{{ route('topics.update', $topic->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Topic Name:</label>
                <input type="text" id="name" name="name" value="{{ $topic->name }}" required>
            </div>
            <div class="form-group">
                <label for="link">Topic Link:</label>
                <input type="url" id="link" name="link" value="{{ $topic->link }}" required>
            </div>
            <button type="submit" class="btn">Update Topic</button>
        </form>
    </div>
</body>
</html>
