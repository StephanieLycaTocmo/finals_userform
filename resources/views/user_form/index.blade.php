<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark mb-3">
            <a class="navbar-brand" href="#">User Registration Form</a>
        </nav>
        <div class="container">
            <user-form-component :user="{{ $user }}" />
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
