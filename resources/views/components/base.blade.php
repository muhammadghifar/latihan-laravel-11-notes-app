<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-gray-400 px-8 py-4 flex justify-between items-center">
        <h2 class="font-bold text-2xl">Laravel</h2>
        <span>Halo, {{ $name }}!</span>
    </nav>

    <section class="p-8 mx-auto">
        {{ $content }}
    </section>
</body>

</html>
