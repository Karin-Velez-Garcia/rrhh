@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón Nuevo Empleado -->
    <div class="mb-6">
        <a href="{{ route('empleados.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Nuevo Empleado
        </a>
    </div>

    <!-- Vista Desktop: Tabla -->
    <div class="hidden lg:block bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre Completo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DPI</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado Civil</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Ingreso</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($empleados as $empleado)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $empleado->codigo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $empleado->nombre_completo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $empleado->dpi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $empleado->email ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $empleado->estadoCivil->nombre ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $empleado->fecha_ingreso ? $empleado->fecha_ingreso->format('d/m/Y') : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $empleado->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $empleado->activo_texto }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('empleados.show', $empleado) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs">
                                        Ver
                                    </a>
                                    <a href="{{ route('empleados.edit', $empleado) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-xs">
                                        Editar
                                    </a>
                                    <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No hay empleados registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Vista Mobile/Tablet: Tarjetas -->
    <div class="lg:hidden space-y-4">
        @forelse($empleados as $empleado)
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $empleado->nombre_completo }}</h3>
                        <p class="text-sm text-gray-600">Código: {{ $empleado->codigo }}</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $empleado->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $empleado->activo_texto }}
                    </span>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm mb-4">
                    <div><span class="font-medium text-gray-700">DPI:</span> {{ $empleado->dpi }}</div>
                    <div><span class="font-medium text-gray-700">Email:</span> {{ $empleado->email ?? 'N/A' }}</div>
                    <div><span class="font-medium text-gray-700">Estado Civil:</span> {{ $empleado->estadoCivil->nombre ?? 'N/A' }}</div>
                    <div><span class="font-medium text-gray-700">Fecha Ingreso:</span> {{ $empleado->fecha_ingreso ? $empleado->fecha_ingreso->format('d/m/Y') : 'N/A' }}</div>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('empleados.show', $empleado) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded text-xs flex-1 sm:flex-none text-center">
                        Ver
                    </a>
                    <a href="{{ route('empleados.edit', $empleado) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded text-xs flex-1 sm:flex-none text-center">
                        Editar
                    </a>
                    <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="flex-1 sm:flex-none" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-xs w-full">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white shadow-md rounded-lg p-8 text-center">
                <p class="text-gray-500">No hay empleados registrados.</p>
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $empleados->links() }}
    </div>
</div>

<script>
    // Auto-hide success message
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 500);
            }, 3000);
        }
    });
</script>
@endsection