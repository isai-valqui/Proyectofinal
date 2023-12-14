<x-app-layout>
<h1>Proveedores</h1>
<ul>
    @foreach ($proveedores as $proveedor)
        <li>
            <a href="{{ route('proveedor.show', $proveedor) }}">{{ $proveedor->nombre_p }}</a>
        </li>
    @endforeach
</ul>
</x-app-layout>