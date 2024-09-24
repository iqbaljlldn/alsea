<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body>

    <main class="mt-6">
        <div class="card">
            <form action="{{ route('store') }}" method="POST">
                <input type="text" name="name">
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

    </div>
    </div>
    </div>
</body>

</html>
