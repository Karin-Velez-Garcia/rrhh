<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sexos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('sexos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Nuevo Sexo
                        </a>
                    </div>

                    <!-- Vista Desktop: Tabla -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha Creación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($sexos as $sexo)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $sexo->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $sexo->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($sexo->activo)
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                    Activo
                                                </span>
                                            @else
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                    Inactivo
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $sexo->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('sexos.show', $sexo) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                    Ver
                                                </a>
                                                <a href="{{ route('sexos.edit', $sexo) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                    Editar
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            No hay sexos registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Vista Mobile/Tablet: Tarjetas -->
                    <div class="lg:hidden space-y-4">
                        @forelse ($sexos as $sexo)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $sexo->nombre }}</h3>
                                        <p class="text-sm text-gray-600">ID: {{ $sexo->id }}</p>
                                    </div>
                                    @if ($sexo->activo)
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Activo
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                            Inactivo
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-700">
                                        <span class="font-medium">Fecha Creación:</span> 
                                        {{ $sexo->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                                
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('sexos.show', $sexo) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-3 rounded text-xs flex-1 sm:flex-none text-center">
                                        Ver
                                    </a>
                                    <a href="{{ route('sexos.edit', $sexo) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded text-xs flex-1 sm:flex-none text-center">
                                        Editar
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gray-50 rounded-lg p-8 text-center border border-gray-200">
                                <p class="text-gray-500">No hay sexos registrados.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        {{ $sexos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success message after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.transition = 'opacity 0.5s ease-out';
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>
</x-app-layout>