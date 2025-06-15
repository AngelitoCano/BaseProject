@extends('backend.menus.superior')

<section class="conten">
<div class="container py-4">
    <h2 class="text-center mb-4">Listado de Productos</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 position-relative">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 200px;">
                    @else
                        <img src="https://via.placeholder.com/300x200.png?text=Sin+Imagen" class="card-img-top" alt="No image">
                    @endif

                    <form action="{{ route('cart.add') }}" method="POST" class="p-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-success w-100">Agregar al carrito 🛒</button>
                    </form>

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p class="card-text"><strong>Categoría:</strong> {{ $product->category->name ?? 'Sin categoría' }}</p>
                    </div>

                    <div class="overlay-description">
                        <p class="m-0 p-2 text-white">{{ $product->description ?? 'Sin descripción' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>

<a href="{{ route('cart.show') }}" class="btn btn-primary cart-float-button">
    🛒 Ver Carrito
</a>

<style>
    .card {
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .overlay-description {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.75);
        color: white;
        transform: translateY(100%);
        transition: transform 0.3s ease;
        font-size: 0.9rem;
        padding: 10px;
    }

    .card:hover .overlay-description {
        transform: translateY(0%);
    }

    /*boton carrito*/
    .cart-float-button {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        border-radius: 50px;
        padding: 12px 18px;
        font-size: 1rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.25);
        transition: all 0.3s ease;
    }

    .cart-float-button:hover {
        background-color: #0056b3;
        text-decoration: none;
        transform: scale(1.05);
    }
</style>
</section>