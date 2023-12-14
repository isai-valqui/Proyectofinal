<form method="POST" action="{{ route('venta.store') }}">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <label for="cantidad">Cantidad:</label>
    <input type="text" id="cantidad" name="cantidad">
    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio">
    <label for="cliente_id">Cliente ID:</label>
    <input type="text" id="cliente_id" name="clienteid">
    <input type="submit" value="Crear">
</form>