@extends('backend.menus.superior')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('tablaProductos.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image">
            
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$product->image) }}" width="100" class="img-thumbnail">
                    <p class="text-muted">Imagen actual</p>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tablaProductos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection