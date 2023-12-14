<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f8f9fa;
    }
    
    .container {
        width: 80%;
        max-width: 800px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }
    
    th:last-child, td:last-child {
        text-align: right;
    }
    
    a {
        text-decoration: none;
        color: #333;
    }
    
    a:hover {
        color: #5D6D7E;
    }
    </style>
    
    <h1>Listado de Baristas</h1>
    
    @foreach($baristas as $barista)
        <div class="container">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td>{{ $barista->nombre_bar }}</td>
                </tr>
                <tr>
                    <td>Apellido:</td>
                    <td>{{ $barista->apellido }}</td>
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td>{{ $barista->correo }}</td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td>{{ $barista->telefono }}</td>
                </tr>
            </table>
        </div>
    @endforeach