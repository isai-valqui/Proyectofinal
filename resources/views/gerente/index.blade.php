<x-app-layout>
    <h1>Anuncios</h1>

    <p>{{ $venta->nombre }}</p>
    <p>{{ $venta->cantidad }}</p>
    <p>{{ $venta->precio }}</p>
    <p>{{ $venta->cliente->nombre }}</p>
</x-app-layout>

