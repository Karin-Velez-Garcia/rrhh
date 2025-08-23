<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $estados = Estado::orderBy('nombre')->paginate(10);
        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_estado,nombre',
            'descripcion' => 'nullable|string|max:500',
            'activo' => 'boolean'
        ]);

        Estado::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => $request->has('activo')
        ]);

        return redirect()->route('estados.index')
            ->with('success', 'Estado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado): View
    {
        return view('estados.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estado $estado): View
    {
        return view('estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_estado,nombre,' . $estado->id,
            'descripcion' => 'nullable|string|max:500',
            'activo' => 'boolean'
        ]);

        $estado->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => $request->has('activo')
        ]);

        return redirect()->route('estados.index')
            ->with('success', 'Estado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estado $estado): RedirectResponse
    {
        $estado->delete();
        
        return redirect()->route('estados.index')
            ->with('success', 'Estado eliminado exitosamente.');
    }
}
