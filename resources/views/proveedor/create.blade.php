<h1>Crear Proveedor</h1>
<form method="POST" action="{{ route('proveedor.store') }}">
    @csrf
    Nombre: <input type="text" name="nombre_p" required><br>
    Pais: <input type="text" name="pais" required><br>
    Correo: <input type="email" name="correo" required><br>
    Celular: <input type="number" name="celular" required><br>
    <input type="submit" value="Crear">
</form>