<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(145deg, #4e54c8, #8f94fb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 1.8rem;
            /* display: flex; */
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            font-weight: 500;
            color: #2c3e50;
        }

        input[type="email"], input[type="password"] ,input[type="text"] {
            width: 100%;
            padding: 0.9rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f9f9f9;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        input[type="email"]:focus, input[type="password"]:focus, input[type="text"]:focus {
            border-color: #8f94fb;
            outline: none;
            box-shadow: 0 0 6px rgba(143, 148, 251, 0.6);
            background-color: #ffffff;
        }

        .btn {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #ffffff;
            padding: 0.9rem;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s;
        }

        .btn:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .link {
            margin-top: 1.5rem;
        }

        .link a {
            color: #6a11cb;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .link a:hover {
            color: #2575fc;
            text-decoration: underline;
        }

        .error {
            background: #e74c3c;
            color: #ffffff;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .error ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .error li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Signup</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn">Signup</button>
        </form>
        <div class="link">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
