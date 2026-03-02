<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;

class ProductController extends Controller
{
	public function index()
	{
		$categorias = Categoria::all();
		return view('index', compact('categorias'));
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'nombre' => 'required',
			'precio' => 'required|numeric|min:0',
			'categoria_id' => 'required|exists:categorias,id',
		]);
		$producto = Producto::create([
			'nombre' => $validated['nombre'],
			'precio' => $validated['precio'],
			'categoria_id' => $validated['categoria_id'],
		]);
		// Optionally associate with category
		// You may want to add a pivot table if many-to-many
		return redirect()->route('products.show');
	}

	public function show()
	{
		$productos = Producto::all();
		$categorias = Categoria::all();
		return view('show', compact('productos', 'categorias'));
	}
}