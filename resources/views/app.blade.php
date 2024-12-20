<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
</head>
<body>
    <header>
        <h1>My Laravel App</h1>
        <nav>
            <a href="/">Home</a> | <a href="/form">Form</a> | <a href="/data">Data</a>
        </nav>
    </header>

    @yield('content')

    <footer>
        <p>Laravel App &copy; 2024</p>
    </footer>
</body>
</html>
