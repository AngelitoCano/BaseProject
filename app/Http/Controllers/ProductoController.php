<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

class ProductoController extends Controller
{
    public function mostrarProductos()
    {
        // Ruta del archivo XML
        $rutaArchivo = '/xml/productos.xml';

        // Verificar si el archivo existe
        if (!Storage::exists($rutaArchivo)) {
            return response()->json(['error' => 'El archivo XML no existe'], 404);
        }

        // Leer el contenido del XML
        $contenidoXML = Storage::get($rutaArchivo);

        // Convertir XML a objeto PHP
        $xml = new SimpleXMLElement($contenidoXML);

        // Convertir el objeto SimpleXML a array (para mejor manejo)
        $productos = [];
        foreach ($xml->producto as $producto) {
            $productos[] = [
                'imagen' => (string)$producto->imagen,
                'nombre' => (string)$producto->nombre,
                'descripcion' => (string)($producto->descripción ?? $producto->descripcion ?? ''),
                'precio' => (float)$producto->precio,
                'categoria' => (string)($producto->categoría ?? $producto->categoria ?? ''),
            ];
        }

        // Pasar los datos a la vista
        return view("productos", ['productos' => $productos]);
    }
}