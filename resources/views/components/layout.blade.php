<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'DUT Setups' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-100 text-zinc-900 min-h-screen">



    <x-header />
        {{ $slot }}
    </main>

</body>
</html>
