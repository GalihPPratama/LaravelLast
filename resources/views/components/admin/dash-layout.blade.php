<!doctype html>
<html class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset    = "UTF-8">
    <meta name       = "viewport" content        = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Document</title>
</head>

<body class="h-full antialiased">
    <div class="min-h-full">
        <x-admin.dash-nav />
        <x-admin.dash-sidebar />

        <main class="p-4 md:ml-64 pt-20">
            <header class="mb-4">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $judul ?? '' }}
                </h1>
            </header>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
