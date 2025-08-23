@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold text-gray-900">Detalles del Empleado</h1>
                        <p class="text-sm text-gray-500">Información completa del empleado {{ $empleado->nombre_completo }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <!-- Header with gradient -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 rounded-t-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ $empleado->nombre_completo }}</h2>
                        <p class="text-blue-100">Código: {{ $empleado->codigo }}</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $empleado->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $empleado->activo_texto }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Información Básica -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Información Básica
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">ID:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->id }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">Código:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->codigo }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">Nombres:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->nombres }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">Apellidos:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->apellidos }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">DPI:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->dpi }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">NIT:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->nit ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">IGSS:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->igss ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">Nacimiento:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->fecha_nacimiento ? $empleado->fecha_nacimiento->format('d/m/Y') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-24">Estado Civil:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->estadoCivil->nombre ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Información de Contacto -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Información de Contacto
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Teléfono:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->telefono ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Email:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->email ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-sm font-medium text-gray-500 w-32">Dirección:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->direccion ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Contacto Emerg.:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->contacto_emergencia ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Tel. Emergencia:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->telefono_emergencia ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Información Laboral -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                            Información Laboral
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Cuenta Bancaria:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->cuenta_bancaria ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Fecha Ingreso:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->fecha_ingreso ? $empleado->fecha_ingreso->format('d/m/Y') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Fecha Egreso:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->fecha_egreso ? $empleado->fecha_egreso->format('d/m/Y') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Supervisor:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->supervisor->nombre_completo ?? 'Sin supervisor' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Información Temporal -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Información Temporal
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Creado:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-500 w-32">Actualizado:</span>
                                <span class="text-sm text-gray-900">{{ $empleado->updated_at->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subordinados -->
                @if($empleado->subordinados->count() > 0)
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Empleados Supervisados ({{ $empleado->subordinados->count() }})
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($empleado->subordinados as $subordinado)
                                    <div class="bg-white rounded-lg p-3 shadow-sm">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $subordinado->nombre_completo }}</p>
                                                <p class="text-sm text-gray-500">{{ $subordinado->codigo }}</p>
                                            </div>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $subordinado->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $subordinado->activo_texto }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="bg-gray-50 px-6 py-4 rounded-b-lg flex justify-between">
                <a href="{{ route('empleados.edit', $empleado) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Editar Empleado
                </a>
                <a href="{{ route('empleados.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver a la Lista
                </a>
            </div>
        </div>
    </div>
</div>
@endsection