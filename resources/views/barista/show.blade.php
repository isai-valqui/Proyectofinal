<x-app-layout>
<h1>Detalles del Barista</h1>

@foreach($baristas as $barista)
    <p>Nombre: {{ $barista->nombre_bar }}</p>
    <p>Apellido: {{ $barista->apellido }}</p>
    <p>Correo: {{ $barista->correo }}</p>
    <p>Teléfono: {{ $barista->telefono }}</p>
    <hr>
@endforeach

</x-app-layout>
