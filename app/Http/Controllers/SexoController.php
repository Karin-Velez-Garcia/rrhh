<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sexos = Sexo::paginate(10);
        return view('sexos.index', compact('sexos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('sexos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_sexo,nombre',
            'activo' => 'boolean',
        ]);

        Sexo::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('sexos.index')
            ->with('success', 'Sexo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sexo $sexo): View
    {
        return view('sexos.show', compact('sexo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sexo $sexo): View
    {
        return view('sexos.edit', compact('sexo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sexo $sexo): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_sexo,nombre,' . $sexo->id,
            'activo' => 'boolean',
        ]);

        $sexo->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('sexos.index')
            ->with('success', 'Sexo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sexo $sexo): RedirectResponse
    {
        $sexo->delete();

        return redirect()->route('sexos.index')
            ->with('success', 'Sexo eliminado exitosamente.');
    }
}
