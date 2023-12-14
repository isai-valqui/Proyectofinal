<!-- resources/views/baristas/create.blade.php -->
<h1>Crear Barista</h1>

<form action="{{ route('barista.store') }}" method="POST">
    @csrf
    <label for="nombre_bar">Nombre:</label>
    <input type="text" name="nombre_bar" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required>
    
    <label for="correo">Correo:</label>
    <input type="email" name="correo" required>
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required>
    
    <button type="submit">Guardar</button>
</form>
