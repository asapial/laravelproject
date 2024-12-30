<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebJa</title>
    <!-- Link the common CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('header') <!-- Include the Header -->
    @include('sidebar') <!-- Include the Sidebar -->
    <div id="mainContent">
        @yield('content') <!-- Placeholder for dynamic content -->
    </div>
    @include('footer') <!-- Include the Footer -->
</body>
</html>
