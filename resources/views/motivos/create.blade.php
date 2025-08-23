<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Motivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Nuevo Motivo</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Complete la información para crear un nuevo motivo.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('motivos.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">
                                    Nombre *
                                </label>
                                <input type="text" 
                                       name="nombre" 
                                       id="nombre" 
                                       value="{{ old('nombre') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nombre') border-red-300 @enderror"
                                       required>
                                @error('nombre')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Activo -->
                            <div>
                                <div class="flex items-center">
                                    <input type="checkbox" 
                                           name="activo" 
                                           id="activo" 
                                           value="1"
                                           {{ old('activo', true) ? 'checked' : '' }}
                                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="activo" class="ml-2 block text-sm text-gray-900">
                                        Activo
                                    </label>
                                </div>
                                @error('activo')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end space-x-3">
                            <a href="{{ route('motivos.index') }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>