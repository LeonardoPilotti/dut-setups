<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'DUT Setups' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preload" as="image" href="/images/fundo.png">
</head>

<body class="h-full ">
    <div class="h-full flex flex-col">
        <x-header />
        <main class="flex-1 overflow-hidden">
            {{ $slot }}
        </main>
    </div>
</body>
</html>