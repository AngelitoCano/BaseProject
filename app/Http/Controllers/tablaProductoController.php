<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class tablaProductoController extends Controller{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('tablaProductos.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tablaProductos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            Product::create($validated);

            return redirect()->route('tablaProductos.index')
                ->with('success', 'Producto creado exitosamente');
                
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al crear el producto: '.$e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('tablaProductos.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $validated['image'] = $request->file('image')->store('products', 'public');
            }

            $product->update($validated);

            return redirect()->route('tablaProductos.index')
                ->with('success', 'Producto actualizado exitosamente');
                
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al actualizar el producto: '.$e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $product->delete();
            
            return redirect()->route('tablaProductos.index')
                ->with('success', 'Producto eliminado exitosamente');
                
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el producto: '.$e->getMessage());
        }
    }
}