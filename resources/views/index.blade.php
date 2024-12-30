<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebJa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  <!-- Common CSS File -->
    <link rel="stylesheet" href="{{ asset('css/data.css') }}">  <!-- Common CSS File -->
</head>
<body>

    <div id="container">
        @include('header')  <!-- Include header -->
        @include('sidebar')  <!-- Include sidebar -->
        @include('body')  <!-- Include body content -->
        @include('footer')  <!-- Include footer -->

      </div>

    <script src="{{ asset('js/script.js') }}"></script>  <!-- If you have any JS file -->
</body>
</html>
