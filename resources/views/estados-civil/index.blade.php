<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estados Civiles') }}
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
                        <a href="{{ route('estados-civil.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Nuevo Estado Civil
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
                                        Fecha de Creación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($estadosCiviles as $estadoCivil)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $estadoCivil->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $estadoCivil->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $estadoCivil->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $estadoCivil->activo_texto }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $estadoCivil->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('estados-civil.show', $estadoCivil) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                    Ver
                                                </a>
                                                <a href="{{ route('estados-civil.edit', $estadoCivil) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                    Editar
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            No hay estados civiles registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Vista Mobile/Tablet: Tarjetas -->
                    <div class="lg:hidden space-y-4">
                        @forelse ($estadosCiviles as $estadoCivil)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $estadoCivil->nombre }}</h3>
                                        <p class="text-sm text-gray-600">ID: {{ $estadoCivil->id }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $estadoCivil->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $estadoCivil->activo_texto }}
                                    </span>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-700">
                                        <span class="font-medium">Fecha Creación:</span> 
                                        {{ $estadoCivil->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                                
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('estados-civil.show', $estadoCivil) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-3 rounded text-xs flex-1 sm:flex-none text-center">
                                        Ver
                                    </a>
                                    <a href="{{ route('estados-civil.edit', $estadoCivil) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded text-xs flex-1 sm:flex-none text-center">
                                        Editar
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gray-50 rounded-lg p-8 text-center border border-gray-200">
                                <p class="text-gray-500">No hay estados civiles registrados.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        {{ $estadosCiviles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Auto-hide success message after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.transition = 'opacity 0.5s';
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
</x-app-layout>