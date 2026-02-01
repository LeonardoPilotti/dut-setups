<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'DUT Setups' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preload" as="image" href="/images/fundo.png">
</head>

<body class="min-h-screen bg-[#1F2233]">
    <div class="min-h-screen flex flex-col">
        <x-header />

        <main class="flex-1">
            {{ $slot }}
        </main>
        <x-footer/>
    </div>
</body>
</html>
