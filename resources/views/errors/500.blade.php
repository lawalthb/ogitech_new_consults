<!DOCTYPE html>
<html>

<head>
    <style>
        .error-page {
            text-align: center;
            padding: 40px;
            margin-top: 100px;
        }

        .error-page h1 {
            font-size: 72px;
            color: #e74c3c;
        }
    </style>
    <title>500 - Server Error</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="error-page">
            <h1>500</h1>
            <h2>Oops! Something went wrong</h2>
            <p>We're working on fixing this issue.</p>
            <a href="{{ url('/') }}" class="btn">Return Home</a>
        </div>
    </div>
</body>

</html>