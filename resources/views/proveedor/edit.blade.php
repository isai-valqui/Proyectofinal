<h1>Editar Proveedor</h1>
<form method="POST" action="{{ route('proveedor.update', $proveedor) }}">
    @csrf
    @method('PUT')
    Nombre: <input type="text" name="nombre_p" value="{{ $proveedor->nombre_p }}" required><br>
    Pais: <input type="text" name="pais" value="{{ $proveedor->pais }}" required><br>
    Correo: <input type="email" name="correo" value="{{ $proveedor->correo }}" required><br>
    Celular: <input type="number" name="celular" value="{{ $proveedor->celular }}" required><br>
    <input type="submit" value="Guardar cambios">
</form>