<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Agrega un producto al carrito
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    // Muestra la vista del carrito
    public function showCart()
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }

    // Elimina un producto del carrito
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Producto eliminado del carrito.');
    }

    // Vacía completamente el carrito
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart.show')->with('success', 'Carrito vaciado.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = (int) $request->input('quantity', 1);
            $cart[$id]['quantity'] = max(1, $quantity); // no permite menos de 1
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Cantidad actualizada');
    }
}
