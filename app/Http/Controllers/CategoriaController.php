<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('transacciones')
            ->orderBy('tipo')
            ->orderBy('nombre')
            ->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create', [
            'categoria' => new Categoria
        ]);
    }

    public function store(Request $r)
    {
        $d = $r->validate([
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|in:ingreso,gasto',
            'descripcion' => 'nullable|string|max:255'
        ]);

        Categoria::create($d);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $r, Categoria $categoria)
    {
        $d = $r->validate([
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|in:ingreso,gasto',
            'descripcion' => 'nullable|string|max:255'
        ]);

        if (
            $categoria->transacciones()->exists() &&
            $categoria->tipo !== $d['tipo']
        ) {
            return back()
                ->withInput()
                ->with('error', 'No puedes cambiar el tipo porque esta categoría ya tiene transacciones.');
        }

        $categoria->update($d);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->transacciones()->exists()) {
            return back()
                ->with('error', 'No se puede eliminar: la categoría tiene transacciones asociadas.');
        }

        $categoria->delete();

        return back()->with('success', 'Categoría eliminada.');
    }
}