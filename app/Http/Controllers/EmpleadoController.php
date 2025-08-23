<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\EstadoCivil;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with(['estadoCivil', 'supervisor'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estadosCiviles = EstadoCivil::active()->get();
        $supervisores = Empleado::active()->get();
        return view('empleados.create', compact('estadosCiviles', 'supervisores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:empleados',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dpi' => 'required|string|max:20|unique:empleados',
            'nit' => 'nullable|string|max:20',
            'igss' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'estado_civil_id' => 'required|exists:cat_estado_civil,id',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:empleados',
            'direccion' => 'nullable|string|max:500',
            'contacto_emergencia' => 'nullable|string|max:255',
            'telefono_emergencia' => 'nullable|string|max:20',
            'cuenta_bancaria' => 'nullable|string|max:50',
            'fecha_ingreso' => 'required|date',
            'fecha_egreso' => 'nullable|date|after:fecha_ingreso',
            'supervisor_id' => 'nullable|exists:empleados,id',
            'activo' => 'boolean'
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0;

        Empleado::create($data);

        return redirect()->route('empleados.index')
                        ->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $empleado->load(['estadoCivil', 'supervisor', 'subordinados']);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $estadosCiviles = EstadoCivil::active()->get();
        $supervisores = Empleado::active()->where('id', '!=', $empleado->id)->get();
        return view('empleados.edit', compact('empleado', 'estadosCiviles', 'supervisores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:empleados,codigo,' . $empleado->id,
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dpi' => 'required|string|max:20|unique:empleados,dpi,' . $empleado->id,
            'nit' => 'nullable|string|max:20',
            'igss' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'estado_civil_id' => 'required|exists:cat_estado_civil,id',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:empleados,email,' . $empleado->id,
            'direccion' => 'nullable|string|max:500',
            'contacto_emergencia' => 'nullable|string|max:255',
            'telefono_emergencia' => 'nullable|string|max:20',
            'cuenta_bancaria' => 'nullable|string|max:50',
            'fecha_ingreso' => 'required|date',
            'fecha_egreso' => 'nullable|date|after:fecha_ingreso',
            'supervisor_id' => 'nullable|exists:empleados,id',
            'activo' => 'boolean'
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0;

        $empleado->update($data);

        return redirect()->route('empleados.index')
                        ->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
                        ->with('success', 'Empleado eliminado exitosamente.');
    }
}