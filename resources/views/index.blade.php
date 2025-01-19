<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebJa</title>

    <!-- Common CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/data.css') }}">  

    <!-- Add any additional meta tags or third-party CSS libraries here -->
</head>
<body>

    <!-- Main Container -->
    <div id="container">
        <!-- Include Header -->
        @include('header')

        <!-- Include Sidebar -->
        @include('sidebar')

        <!-- Include Body Content -->
        @include('body')

        <!-- Include Footer -->
        @include('footer')
    </div>

    <!-- Common JavaScript File -->
    <script src="{{ asset('js/script.js') }}"></script>  

    <!-- Add additional JS libraries or scripts here -->
</body>
</html>
