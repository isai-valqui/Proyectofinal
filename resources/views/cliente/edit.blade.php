<form method="POST" action="{{ route('cliente.update', $cliente) }}">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="{{ $cliente->telefono }}">
    <label for="tipo_pago">Tipo de Pago:</label>
    <input type="text" id="tipo_pago" name="tipo_pago" value="{{ $cliente->tipo_pago }}">
    <input type="submit" value="Actualizar">
</form>