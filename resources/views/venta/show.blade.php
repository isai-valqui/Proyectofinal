<x-app-layout>

        <h1>Listado de Clientes y Ventas</h1>
        
        @foreach ($clientes as $cliente)
            <div class="container">
                <h2>Cliente</h2>
                <table>
                    <tr>
                        <td>Nombre:</td>
                        <td>{{ $cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <td>Teléfono:</td>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <td>Tipo de Pago:</td>
                        <td>{{ $cliente->tipo_pago }}</td>
                    </tr>
                </table>
        
                <h2>Ventas del Cliente</h2>
        
                @forelse ($cliente->ventas as $venta)
                    <div style="border: 1px solid #ccc; margin-bottom: 10px; padding: 5px;">
                        <h3>Venta #{{ $venta->id }}</h3>
                        <table>
                            <tr>
                                <td>Nombre:</td>
                                <td>{{ $venta->nombre }}</td>
                            </tr>
                            <tr>
                                <td>Cantidad:</td>
                                <td>{{ $venta->cantidad }}</td>
                            </tr>
                            <tr>
                                <td>Precio:</td>
                                <td>{{ $venta->precio }}</td>
                            </tr>
                        </table>
                    </div>
                @empty
                    <p>No hay ventas registradas para este cliente.</p>
                @endforelse
            </div>
        @endforeach
</x-app-layout>

