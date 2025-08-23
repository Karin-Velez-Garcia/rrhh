<?php

namespace App\Http\Controllers;

use App\Models\Prioridad;
use Illuminate\Http\Request;

class PrioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prioridades = Prioridad::orderBy('created_at', 'desc')->paginate(10);
        return view('prioridades.index', compact('prioridades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prioridades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_prioridad,nombre',
        ]);

        Prioridad::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('prioridades.index')
            ->with('success', 'Prioridad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prioridad $prioridad)
    {
        return view('prioridades.show', compact('prioridad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prioridad $prioridad)
    {
        return view('prioridades.edit', compact('prioridad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prioridad $prioridad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_prioridad,nombre,' . $prioridad->id,
        ]);

        $prioridad->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('prioridades.index')
            ->with('success', 'Prioridad actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prioridad $prioridad)
    {
        $prioridad->delete();

        return redirect()->route('prioridades.index')
            ->with('success', 'Prioridad eliminada exitosamente.');
    }
}