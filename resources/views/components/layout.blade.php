
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'DUT Setups' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">

    <x-header />
    <!-- Conteúdo da página -->
    <main class="max-w-5xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>

</body>
</html>
