<?php

namespace App\Http\Controllers;

use App\Models\Renglon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RenglonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $renglones = Renglon::paginate(10);
        return view('renglones.index', compact('renglones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('renglones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_renglon,nombre',
            'activo' => 'boolean',
        ]);

        Renglon::create([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('renglones.index')
            ->with('success', 'Renglón creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Renglon $renglone): View
    {
        return view('renglones.show', compact('renglone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Renglon $renglone): View
    {
        return view('renglones.edit', compact('renglone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Renglon $renglone): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cat_renglon,nombre,' . $renglone->id,
            'activo' => 'boolean',
        ]);

        $renglone->update([
            'nombre' => $request->nombre,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('renglones.index')
            ->with('success', 'Renglón actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renglon $renglone): RedirectResponse
    {
        $renglone->delete();

        return redirect()->route('renglones.index')
            ->with('success', 'Renglón eliminado exitosamente.');
    }
}
