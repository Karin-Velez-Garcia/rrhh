<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tiposDocumento = TipoDocumento::orderBy('nombre')->paginate(10);
        return view('tipos-documento.index', compact('tiposDocumento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tipos-documento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_documento,nombre',
            'activo' => 'boolean',
        ]);

        TipoDocumento::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('tipos-documento.index')
            ->with('success', 'Tipo de documento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoDocumento $tipoDocumento): View
    {
        return view('tipos-documento.show', compact('tipoDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoDocumento $tipoDocumento): View
    {
        return view('tipos-documento.edit', compact('tipoDocumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoDocumento $tipoDocumento): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_documento,nombre,' . $tipoDocumento->id,
            'activo' => 'boolean',
        ]);

        $tipoDocumento->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('tipos-documento.index')
            ->with('success', 'Tipo de documento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoDocumento $tipoDocumento): RedirectResponse
    {
        $tipoDocumento->delete();

        return redirect()->route('tipos-documento.index')
            ->with('success', 'Tipo de documento eliminado exitosamente.');
    }
}