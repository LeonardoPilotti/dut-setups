<div class="fixed inset-0 bg-cover bg-center z-0"
     style="background-image: url('{{ asset('images/fundo.jpg') }}');">
    <!-- Overlay opcional para escurecer o fundo e deixar o texto mais legível -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
</div>

<div class="relative z-10 flex items-center justify-center min-h-screen">
    {{ $slot }}
</div>
