@extends('backend.plantilla-form')

@section('titulo', 'Editar Producto')

@section('contenido')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Producto: {{ $product->name }}</h3>
    </div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tablaProductos.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select class="form-control @error('category_id') is-invalid @enderror"
                        id="category_id" name="category_id" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                       id="image" name="image">
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                @if($product->image)
                    <div class="mt-3">
                        <img src="{!! $product->image !!}" width="100" class="img-thumbnail">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox"
                                   id="remove_image" name="remove_image">
                            <label class="form-check-label" for="remove_image">
                                Eliminar imagen actual
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Actualizar
                </button>
                <a href="{{ route('tablaProductos.indexProductos') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection