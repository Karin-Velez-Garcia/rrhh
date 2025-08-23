<?php

namespace App\Http\Controllers;

use App\Models\TipoPermiso;
use Illuminate\Http\Request;

class TipoPermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposPermiso = TipoPermiso::orderBy('nombre')->paginate(10);
        return view('tipos-permiso.index', compact('tiposPermiso'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos-permiso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_permiso,nombre',
            'activo' => 'boolean'
        ]);

        TipoPermiso::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo')
        ]);

        return redirect()->route('tipos-permiso.index')
            ->with('success', 'Tipo de Permiso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoPermiso $tipoPermiso)
    {
        return view('tipos-permiso.show', compact('tipoPermiso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoPermiso $tipoPermiso)
    {
        return view('tipos-permiso.edit', compact('tipoPermiso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoPermiso $tipoPermiso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_permiso,nombre,' . $tipoPermiso->id,
            'activo' => 'boolean'
        ]);

        $tipoPermiso->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo')
        ]);

        return redirect()->route('tipos-permiso.index')
            ->with('success', 'Tipo de Permiso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoPermiso $tipoPermiso)
    {
        $tipoPermiso->delete();

        return redirect()->route('tipos-permiso.index')
            ->with('success', 'Tipo de Permiso eliminado exitosamente.');
    }
}