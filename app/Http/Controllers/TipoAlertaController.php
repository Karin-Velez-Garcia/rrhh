<?php

namespace App\Http\Controllers;

use App\Models\TipoAlerta;
use Illuminate\Http\Request;

class TipoAlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposAlerta = TipoAlerta::orderBy('created_at', 'desc')->paginate(10);
        return view('tipos-alerta.index', compact('tiposAlerta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos-alerta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_alerta,nombre',
        ]);

        TipoAlerta::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('tipos-alerta.index')
            ->with('success', 'Tipo de Alerta creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoAlerta $tipoAlerta)
    {
        return view('tipos-alerta.show', compact('tipoAlerta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoAlerta $tipoAlerta)
    {
        return view('tipos-alerta.edit', compact('tipoAlerta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoAlerta $tipoAlerta)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_tipo_alerta,nombre,' . $tipoAlerta->id,
        ]);

        $tipoAlerta->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('tipos-alerta.index')
            ->with('success', 'Tipo de Alerta actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoAlerta $tipoAlerta)
    {
        $tipoAlerta->delete();

        return redirect()->route('tipos-alerta.index')
            ->with('success', 'Tipo de Alerta eliminado exitosamente.');
    }
}