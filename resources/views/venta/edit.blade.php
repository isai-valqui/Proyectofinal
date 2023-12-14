<form method="POST" action="{{ route('venta.update', $venta) }}">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $venta->nombre }}">
    <label for="cantidad">Cantidad:</label>
    <input type="text" id="cantidad" name="cantidad" value="{{ $venta->cantidad }}">
    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio" value="{{ $venta->precio }}">
    <label for="clienteid">Cliente ID:</label>
    <input type="text" id="clienteid" name="clienteid" value="{{ $venta->clienteid }}">
    <input type="submit" value="Actualizar">
</form>