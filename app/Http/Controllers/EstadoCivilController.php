<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadosCiviles = EstadoCivil::orderBy('created_at', 'desc')->paginate(10);
        return view('estados-civil.index', compact('estadosCiviles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estados-civil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_estado_civil,nombre',
        ]);

        EstadoCivil::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('estados-civil.index')
            ->with('success', 'Estado Civil creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EstadoCivil $estadoCivil)
    {
        return view('estados-civil.show', compact('estadoCivil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadoCivil $estadoCivil)
    {
        return view('estados-civil.edit', compact('estadoCivil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstadoCivil $estadoCivil)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_estado_civil,nombre,' . $estadoCivil->id,
        ]);

        $estadoCivil->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('estados-civil.index')
            ->with('success', 'Estado Civil actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstadoCivil $estadoCivil)
    {
        $estadoCivil->delete();

        return redirect()->route('estados-civil.index')
            ->with('success', 'Estado Civil eliminado exitosamente.');
    }
}