@extends('backend.plantilla-form')

@section('titulo', 'Lista de Productos')

@section('contenido')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0"><i class="fas fa-boxes"></i> Lista de Productos</h4>
        <a href="{{ route('tablaProductos.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if($products->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><strong>{{ $product->name }}</strong></td>
                                <td>{{ Str::limit($product->description, 40) }}</td>
                                <td><span class="badge bg-info">${{ number_format($product->price, 2) }}</span></td>
                                <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                                <td>
                              @php
                                use Illuminate\Support\Str;
                            @endphp

                            @if($product->image && Str::startsWith($product->image, 'data:image'))
                                {!! '<img src="'.$product->image.'" width="150" class="rounded shadow-sm">' !!}
                            @elseif($product->image)
                               <img src="{!! $product->image !!}" width="150" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif


                                </td>
                                <td>
                                    <a href="{{ route('tablaProductos.edit', $product->id) }}" class="btn btn-warning btn-sm mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tablaProductos.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-info">No hay productos registrados.</div>
        @endif
    </div>
</div>
@endsection

@section('archivos-js')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
@endsection
