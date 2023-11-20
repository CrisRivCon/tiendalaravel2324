<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articulos.index', [
            'articulo' => Articulo::all(),
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create', [
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'denominacion' => 'required|max:255',
            'precio' => 'required|decimal:0,2',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ]);

        $articulo = new Articulo();
        $articulo->denominacion = $request->input('denominacion');
        $articulo->precio = $request->input('precio');
        $articulo->categoria_id = $request->input('categoria_id');
        $articulo->save();
        return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', [
            'articulo' => $articulo,
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        $validated = $request->validate([
            'denominacion' => 'required|max:255',
            'precio' => 'required|decimal:0,2',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $articulo->denominacion = $request->input('denominacion');
        $articulo->precio = $request->input('precio');
        $articulo->categoria_id = $request->input('categoria_id');
        $articulo->save();
        return redirect()->route('articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}
