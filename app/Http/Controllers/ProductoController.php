<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;

class ProductoController extends Controller
{
    public function index()
    {
        //$productos = Producto::all(); //all(): SELECT * FROM productos;
        $productos = Producto::with('categoria')->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();

        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        /* try {
            $validated = $request->validate([
                'nombre'      => 'required|max:255',
                'categoria'   => 'required|exists:categorias,id', // "exists" en lugar de "exits"
                'descripcion' => 'nullable',
                'precio'      => 'required|numeric',
                'stock'       => 'required|integer',
                'imagen'      => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120', // Se usa "mimes"
            ]);

            // Si la validación es exitosa, ejecuta la lógica necesaria
            return response()->json(['message' => 'Datos validados correctamente'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura los errores de validación y los devuelve en la respuesta
            return response()->json(['errors' => $e->errors()], 422);
        } */

        $validated = $request->validate([
            'nombre'      => 'required|max:255',
            'categoria'   => 'required|exists:categorias,id',
            'descripcion' => 'nullable',
            'precio'      => 'required|numeric',
            'stock'       => 'required|integer',
            'imagen'      => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        /* , [
            'nombre.required'   => 'El campo nombre es obligatorio',
            'nombre.max'        => 'El campo nombre no debe superar los 255 caracteres',
            'categoria.required' => 'El campo categoría es obligatorio',
            'categoria.exists'  => 'La categoría seleccionada no existe', // "exists" en lugar de "exits"
            'descripcion.required' => 'El campo descripción es obligatorio',
            'precio.required'   => 'El campo precio es obligatorio',
            'precio.numeric'    => 'El campo precio debe ser un número',
            'stock.required'    => 'El campo stock es obligatorio',
            'stock.integer'     => 'El campo stock debe ser un número entero',
            'imagen.mimes'      => 'El archivo debe ser una imagen válida (jpeg, png, jpg, gif, svg)',
            'imagen.max'        => 'El archivo no debe superar los 5MB',
        ] */

        Producto::create([
            'nombre'      => $validated['nombre'],
            'categoria_id' => $validated['categoria'],
            'descripcion' => $validated['descripcion'],
            'precio'      => $validated['precio'],
            'stock'       => $validated['stock'],
            //'imagen'      => $request->file('imagen')->store('productos', 'public'),
        ]);

        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return $producto;

        //return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id) {}
}
