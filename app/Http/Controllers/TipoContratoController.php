<?php

namespace App\Http\Controllers;

use App\Models\TipoContrato;
use Illuminate\Http\Request;

class TipoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposContrato = TipoContrato::orderBy('nombre')->get();
        return view('tipos-contrato.index', compact('tiposContrato'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos-contrato.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_contrato,nombre',
            'activo' => 'boolean',
        ]);

        TipoContrato::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('tipos-contrato.index')
            ->with('success', 'Tipo de contrato creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoContrato $tipoContrato)
    {
        return view('tipos-contrato.show', compact('tipoContrato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoContrato $tipoContrato)
    {
        return view('tipos-contrato.edit', compact('tipoContrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoContrato $tipoContrato)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_contrato,nombre,' . $tipoContrato->id,
            'activo' => 'boolean',
        ]);

        $tipoContrato->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('tipos-contrato.index')
            ->with('success', 'Tipo de contrato actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoContrato $tipoContrato)
    {
        $tipoContrato->delete();

        return redirect()->route('tipos-contrato.index')
            ->with('success', 'Tipo de contrato eliminado exitosamente.');
    }
}