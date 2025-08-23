@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Empleado</h2>
            
            <form action="{{ route('empleados.update', $empleado) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Información Personal -->
                    <div class="col-span-2">
                        <h3 class="text-lg font-semibold mb-4 text-gray-700 border-b pb-2">Información Personal</h3>
                    </div>
                    
                    <!-- Código -->
                    <div>
                        <label for="codigo" class="block text-sm font-medium text-gray-700 mb-2">Código *</label>
                        <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $empleado->codigo) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('codigo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Nombres -->
                    <div>
                        <label for="nombres" class="block text-sm font-medium text-gray-700 mb-2">Nombres *</label>
                        <input type="text" name="nombres" id="nombres" value="{{ old('nombres', $empleado->nombres) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('nombres')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Apellidos -->
                    <div>
                        <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">Apellidos *</label>
                        <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $empleado->apellidos) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('apellidos')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- DPI -->
                    <div>
                        <label for="dpi" class="block text-sm font-medium text-gray-700 mb-2">DPI *</label>
                        <input type="text" name="dpi" id="dpi" value="{{ old('dpi', $empleado->dpi) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('dpi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- NIT -->
                    <div>
                        <label for="nit" class="block text-sm font-medium text-gray-700 mb-2">NIT</label>
                        <input type="text" name="nit" id="nit" value="{{ old('nit', $empleado->nit) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nit')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- IGSS -->
                    <div>
                        <label for="igss" class="block text-sm font-medium text-gray-700 mb-2">IGSS</label>
                        <input type="text" name="igss" id="igss" value="{{ old('igss', $empleado->igss) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('igss')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Fecha de Nacimiento -->
                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Nacimiento *</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento?->format('Y-m-d')) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('fecha_nacimiento')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Estado Civil -->
                    <div>
                        <label for="estado_civil_id" class="block text-sm font-medium text-gray-700 mb-2">Estado Civil *</label>
                        <select name="estado_civil_id" id="estado_civil_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Seleccionar Estado Civil</option>
                            @foreach($estadosCiviles as $estadoCivil)
                                <option value="{{ $estadoCivil->id }}" {{ old('estado_civil_id', $empleado->estado_civil_id) == $estadoCivil->id ? 'selected' : '' }}>
                                    {{ $estadoCivil->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('estado_civil_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Información de Contacto -->
                    <div class="col-span-2">
                        <h3 class="text-lg font-semibold mb-4 text-gray-700 border-b pb-2 mt-6">Información de Contacto</h3>
                    </div>
                    
                    <!-- Teléfono -->
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $empleado->telefono) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('telefono')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $empleado->email) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Dirección -->
                    <div class="col-span-2">
                        <label for="direccion" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                        <textarea name="direccion" id="direccion" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('direccion', $empleado->direccion) }}</textarea>
                        @error('direccion')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Contacto de Emergencia -->
                    <div>
                        <label for="contacto_emergencia" class="block text-sm font-medium text-gray-700 mb-2">Contacto de Emergencia</label>
                        <input type="text" name="contacto_emergencia" id="contacto_emergencia" value="{{ old('contacto_emergencia', $empleado->contacto_emergencia) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('contacto_emergencia')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Teléfono de Emergencia -->
                    <div>
                        <label for="telefono_emergencia" class="block text-sm font-medium text-gray-700 mb-2">Teléfono de Emergencia</label>
                        <input type="text" name="telefono_emergencia" id="telefono_emergencia" value="{{ old('telefono_emergencia', $empleado->telefono_emergencia) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('telefono_emergencia')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Información Laboral -->
                    <div class="col-span-2">
                        <h3 class="text-lg font-semibold mb-4 text-gray-700 border-b pb-2 mt-6">Información Laboral</h3>
                    </div>
                    
                    <!-- Cuenta Bancaria -->
                    <div>
                        <label for="cuenta_bancaria" class="block text-sm font-medium text-gray-700 mb-2">Cuenta Bancaria</label>
                        <input type="text" name="cuenta_bancaria" id="cuenta_bancaria" value="{{ old('cuenta_bancaria', $empleado->cuenta_bancaria) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('cuenta_bancaria')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Fecha de Ingreso -->
                    <div>
                        <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Ingreso *</label>
                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso?->format('Y-m-d')) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('fecha_ingreso')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Fecha de Egreso -->
                    <div>
                        <label for="fecha_egreso" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Egreso</label>
                        <input type="date" name="fecha_egreso" id="fecha_egreso" value="{{ old('fecha_egreso', $empleado->fecha_egreso?->format('Y-m-d')) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('fecha_egreso')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Supervisor -->
                    <div>
                        <label for="supervisor_id" class="block text-sm font-medium text-gray-700 mb-2">Supervisor</label>
                        <select name="supervisor_id" id="supervisor_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Sin Supervisor</option>
                            @foreach($supervisores as $supervisor)
                                <option value="{{ $supervisor->id }}" {{ old('supervisor_id', $empleado->supervisor_id) == $supervisor->id ? 'selected' : '' }}>
                                    {{ $supervisor->nombre_completo }}
                                </option>
                            @endforeach
                        </select>
                        @error('supervisor_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Estado Activo -->
                    <div class="col-span-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="activo" id="activo" value="1" {{ old('activo', $empleado->activo) ? 'checked' : '' }} 
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="activo" class="ml-2 block text-sm text-gray-900">Empleado activo</label>
                        </div>
                        @error('activo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Botones -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('empleados.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Actualizar Empleado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection