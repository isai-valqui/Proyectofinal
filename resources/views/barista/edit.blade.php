<!-- resources/views/baristas/edit.blade.php -->
<h1>Editar Barista</h1>

<form action="{{ route('barista.update', $barista->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nombre_bar">Nombre:</label>
    <input type="text" name="nombre_bar" value="{{ $barista->nombre_bar }}" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="{{ $barista->apellido }}" required>
    
    <label for="correo">Correo:</label>
    <input type="email" name="correo" value="{{ $barista->correo }}" required>
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="{{ $barista->telefono }}" required>
    
    <button type="submit">Actualizar</button>
</form>
