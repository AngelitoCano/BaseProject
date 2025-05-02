@extends('backend.menus.superior')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CALCULADORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: rgb(255, 255, 255);">

    <section class="content" style="margin-top: 35px;">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h2 class="text-center"><strong>Calculadora</strong></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                
                                <form action="{{ route('soap.calcular') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="num1" class="form-label">Digite el primer número:</label>
                                        <input type="number" name="num1" id="num1" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="num2" class="form-label">Digite el segundo número:</label>
                                        <input type="number" name="num2" id="num2" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="operacion" class="form-label">Seleccione el tipo de operación:</label>
                                        <select name="operacion" id="operacion" class="form-select">
                                            <option value="Add">Sumar</option>
                                            <option value="Multiply">Multiplicar</option>
                                            <option value="Subtract">Restar</option>
                                            <option value="Divide">Division</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Calcular</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @if (isset($resultado))
        <div class="alert alert-primary mt-4 mx-3">
            <strong>Resultado:</strong> {{ $resultado }}
        </div>
    @endif

    @if (isset($error))
        <div class="alert alert-danger mt-4 mx-3">
            <strong>Error:</strong> {{ $error }}
        </div>
    @endif
</body>
</html>