<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class tablaProductoController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(12);
        return view('tablaProductos.indexProductos', compact('products'));
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
                $image = $request->file('image');
                $imageData = base64_encode(file_get_contents($image));
                $mime = $image->getMimeType();
               $validated['image'] = "data:$mime;base64,$imageData";
            }

            Product::create($validated);

            return redirect()->route('tablaProductos.indexProductos')
                ->with('success', 'Producto creado exitosamente');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al crear el producto: ' . $e->getMessage());
        }
    }

    public function edit(Product $tablaProducto)
    {
        $categories = Category::all();
        return view('tablaProductos.edit', [
            'product' => $tablaProducto,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $product = Product::findOrFail($id);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageData = base64_encode(file_get_contents($image));
                $mime = $image->getMimeType();
              $validated['image'] = "data:$mime;base64,$imageData";
            } else {
                unset($validated['image']);
            }

            $product->update($validated);

            return redirect()->route('tablaProductos.indexProductos')
                ->with('success', 'Producto actualizado exitosamente');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = Product::destroy($id);

            if ($deleted) {
                return redirect()->route('tablaProductos.indexProductos')
                    ->with('success', 'Producto eliminado');
            }

            throw new \Exception("No se pudo borrar el registro");
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function usuarioProductos()
    {
        $products = Product::with('category')->paginate(12);
        return view('tablaProductos.usuarioProductos', compact('products'));
    }
}
