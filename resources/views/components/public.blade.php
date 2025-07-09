<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Inventaris Perabotan' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 800px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            background-color: white;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            padding: 2rem;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .container {
            padding: 2.5rem;
            font-size: 1.25rem;
        }

        .container p {
            margin: 1rem 0;
        }

        .container p:first-child {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        footer {
            background-color: #f9f9f9;
            color: #333;
            padding: 1rem 2.5rem;
            font-size: 0.95rem;
            border-top: 1px solid #eee;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-header">
            PLN SIMINPEKA
        </div>

        <main class="container">
            @yield('content')
        </main>

        <footer>
            All Rights Reserved by PLN SIMINPEKA.
        </footer>
    </div>

</body>

</html>
