<form method="POST" action="{{ route('cliente.store') }}">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono">
    <label for="tipo_pago">Tipo de Pago:</label>
    <input type="text" id="tipo_pago" name="tipo_pago">
    <input type="submit" value="Crear">
</form>