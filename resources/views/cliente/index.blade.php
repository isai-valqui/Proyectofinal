@foreach($clientes as $cliente)
    <div>
        <p>{{ $cliente->nombre }}</p>
        <p>{{ $cliente->telefono }}</p>
        <p>{{ $cliente->tipo_pago }}</p>
        <a href="{{ route('cliente.show', $cliente) }}">Ver detalles</a>
        <a href="{{ route('cliente.edit', $cliente) }}">Editar</a>
        <form method="POST" action="{{ route('cliente.destroy', $cliente) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar">
        </form>
    </div>
@endforeach
<a href="{{ route('cliente.create') }}">Crear nuevo cliente</a>