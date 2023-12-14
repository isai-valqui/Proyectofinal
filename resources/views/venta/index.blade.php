@foreach($ventas as $venta)
    <div>
        <p>{{ $venta->nombre }}</p>
        <p>{{ $venta->cantidad }}</p>
        <p>{{ $venta->precio }}</p>
        @if($venta->cliente)
            <p>Cliente: {{ $venta->cliente->nombre }}</p>
        @else
            <p>No hay cliente asociado a esta venta.</p>
        @endif
        <a href="{{ route('venta.edit', $venta->id) }}">Editar</a>
        <!-- Add delete button and form for delete operation -->
        <form action="{{ route('venta.destroy', $venta->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </div>
@endforeach


