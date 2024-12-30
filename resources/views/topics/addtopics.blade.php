<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Topic</title>
    <style>
        /* Global styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Card container */
        .form-container {
            background: #ffffff;
            color: #333333;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        /* Form title */
        .form-container h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #6a11cb;
            text-align: center;
        }

        /* Form fields */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #6a11cb;
            outline: none;
        }

        /* Submit button */
        .btn-submit {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #ffffff;
            font-size: 1rem;
            font-weight: bold;
            padding: 0.8rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        /* Success/Error messages */
        .success, .error {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 10px;
            font-size: 0.9rem;
        }

        .success {
            background: #e0ffee;
            color: #2b7a5b;
        }

        .error {
            background: #ffe6e6;
            color: #a33b3b;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add a New Topic</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add Topic Form -->
        <form action="{{ route('store-topic') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Topic Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter topic name">
            </div>
            <div class="form-group">
                <label for="link">Topic Link:</label>
                <input type="url" id="link" name="link" value="{{ old('link') }}" required placeholder="Enter topic link">
            </div>
            <button type="submit" class="btn-submit">Add Topic</button>
        </form>
    </div>
</body>
</html>
