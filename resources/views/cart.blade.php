@extends('backend.menus.superior')

<section class="conten">
<div class="container py-5">
    <h2 class="mb-4 text-center">🛒 Carrito de Compras</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center justify-content-center gap-2">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" class="btn btn-outline-secondary btn-sm" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>-</button>

                                <span class="px-2">{{ $item['quantity'] }}</span>

                                <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="btn btn-outline-secondary btn-sm">+</button>
                            </form>
                        </td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto del carrito?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end">Total: ${{ number_format($total, 2) }}</h4>

        <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('¿Vaciar todo el carrito?')">
            @csrf
            <button class="btn btn-warning">Vaciar Carrito</button>
        </form>
    @else
        <div class="alert alert-info text-center">
            El carrito está vacío.
        </div>
    @endif
</div>

<a href="{{ route('tablaProductos.usuarioProductos') }}" class="btn btn-primary cart-float-button">
    Volver a la vista productos
</a>

<style>
    /*boton vista producto*/
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

    /*boton de cantidad/*/
    table td form {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }
</style>

</section>