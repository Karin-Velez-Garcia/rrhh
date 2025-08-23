<?php

namespace App\Http\Controllers;

use App\Models\Motivo;
use Illuminate\Http\Request;

class MotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motivos = Motivo::orderBy('created_at', 'desc')->paginate(10);
        return view('motivos.index', compact('motivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motivos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'activo' => 'boolean'
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0;

        Motivo::create($data);

        return redirect()->route('motivos.index')
                        ->with('success', 'Motivo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Motivo $motivo)
    {
        return view('motivos.show', compact('motivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motivo $motivo)
    {
        return view('motivos.edit', compact('motivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motivo $motivo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'activo' => 'boolean'
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0;

        $motivo->update($data);

        return redirect()->route('motivos.index')
                        ->with('success', 'Motivo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motivo $motivo)
    {
        $motivo->delete();

        return redirect()->route('motivos.index')
                        ->with('success', 'Motivo eliminado exitosamente.');
    }
}