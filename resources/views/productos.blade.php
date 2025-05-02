<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos desde productos</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .table-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            vertical-align: middle;
            text-align: center;
        }

        table img {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .table thead {
            background-color:rgb(146, 185, 243);
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9fafc;
        }

        .table-hover tbody tr:hover {
            background-color: #e9f0fa;
        }

        pre {
            background-color: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 10px;
            overflow-x: auto;
        }

        .table-container {
            margin: 0 auto;
            max-width: 1100px;
        }
    </style>
</head>

<tbody>
    <h1>Catálogo de Productos (Datos desde XML)</h1>

    <!-- Mostrar los productos en formato JSON -->
    <h2>Datos en JSON:</h2>
    <pre>{{ json_encode($productos, JSON_PRETTY_PRINT) }}</pre>

    <!-- Tabla con los productos -->
    <h2>Lista de Productos:</h2>
    <div class="table-container mx-auto" style="max-width: 1100px;">
        <table class="table table-bordered table-striped table-hover align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>
                            @if(isset($producto['imagen']))
                                <img src="{{ $producto['imagen'] }}" alt="Imagen del producto" width="120">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>{{ $producto['nombre'] ?? 'Sin nombre' }}</td>
                        <td>{{ $producto['descripcion'] ?? 'Sin descripción' }}</td>
                        <td>${{ number_format($producto['precio'], 2) }}</td>
                        <td>{{ $producto['categoria'] ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>