<div x-data="{ 
    sidebarOpen: false, 
    sidebarCollapsed: false,
    init() {
        // Auto-colapsar en móvil al navegar
        this.$watch('$store.navigation.currentRoute', () => {
            if (window.innerWidth < 1024) {
                this.sidebarOpen = false;
            }
        });
    }
}" @toggle-sidebar.window="sidebarOpen = !sidebarOpen" @toggle-collapse.window="sidebarCollapsed = !sidebarCollapsed">
    <!-- Overlay para móvil -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>

    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-30 bg-white shadow-lg transform lg:translate-x-0 lg:static lg:inset-0 lg:shadow-none h-full transition-all duration-300 ease-in-out"
         :class="{
             'w-64': !sidebarCollapsed,
             'w-16': sidebarCollapsed && window.innerWidth >= 1024,
             'translate-x-0': sidebarOpen || window.innerWidth >= 1024,
             '-translate-x-full': !sidebarOpen && window.innerWidth < 1024
         }">
        
        <!-- Header de la sidebar -->
        <div class="flex items-center justify-between h-16 bg-indigo-600" :class="sidebarCollapsed ? 'px-2' : 'px-6'">
            <h1 class="text-xl font-semibold text-white transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 hidden' : 'opacity-100'">
                RRHH Sistema
            </h1>
            <div class="flex items-center space-x-2">
                <!-- Botón de colapso para desktop -->
                <button @click="sidebarCollapsed = !sidebarCollapsed" class="text-white hidden lg:block p-1 rounded hover:bg-indigo-700 transition-colors">
                    <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarCollapsed ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                    </svg>
                </button>
                <!-- Botón cerrar para móvil -->
                <button @click="sidebarOpen = false" class="text-white lg:hidden p-1 rounded hover:bg-indigo-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navegación -->
        <nav class="mt-8">
            <div class="space-y-2" :class="sidebarCollapsed ? 'px-2' : 'px-4'">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   @click="if (window.innerWidth < 1024) sidebarOpen = false"
                   class="flex items-center py-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}"
                   :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'"
                   :title="sidebarCollapsed ? 'Dashboard' : ''">
                    <svg class="w-5 h-5 flex-shrink-0" :class="sidebarCollapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                    <span class="transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 hidden' : 'opacity-100'">Dashboard</span>
                </a>

                <!-- Empleados -->
                <a href="{{ route('empleados.index') }}" 
                   @click="if (window.innerWidth < 1024) sidebarOpen = false"
                   class="flex items-center py-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('empleados.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}"
                   :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'"
                   :title="sidebarCollapsed ? 'Empleados' : ''">
                    <svg class="w-5 h-5 flex-shrink-0" :class="sidebarCollapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    <span class="transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 hidden' : 'opacity-100'">Empleados</span>
                </a>



                <!-- Configuración -->
                <div x-data="{ configOpen: false }" class="relative">
                    <button @click="configOpen = !configOpen" 
                           class="w-full flex items-center justify-between py-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('estados.*') || request()->routeIs('sexos.*') || request()->routeIs('estados-civil.*') || request()->routeIs('motivos.*') || request()->routeIs('renglones.*') || request()->routeIs('tipos-contrato.*') || request()->routeIs('tipos-documento.*') || request()->routeIs('tipos-permiso.*') || request()->routeIs('prioridades.*') || request()->routeIs('tipos-alerta.*') ? 'bg-indigo-50 text-indigo-600' : '' }}"
                           :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'"
                           :title="sidebarCollapsed ? 'Configuración' : ''">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 flex-shrink-0" :class="sidebarCollapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 hidden' : 'opacity-100'">Configuración</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="configOpen ? 'rotate-180' : '', sidebarCollapsed ? 'opacity-0 hidden' : 'opacity-100'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Submenu -->
                    <div x-show="configOpen && !sidebarCollapsed" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="mt-2 space-y-1 pl-8">
                        <!-- Estados -->
                        <a href="{{ route('estados.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('estados.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Estados
                        </a>
                        
                        <!-- Sexos -->
                        <a href="{{ route('sexos.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('sexos.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Sexos
                        </a>
                        
                        <!-- Estados Civiles -->
                        <a href="{{ route('estados-civil.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('estados-civil.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            Estados Civiles
                        </a>
                        
                        <!-- Motivos -->
                        <a href="{{ route('motivos.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('motivos.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Motivos
                        </a>
                        
                        <!-- Renglones -->
                        <a href="{{ route('renglones.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('renglones.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            Renglones
                        </a>
                        
                        <!-- Tipos de Contrato -->
                        <a href="{{ route('tipos-contrato.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('tipos-contrato.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Tipos de Contrato
                        </a>
                        
                        <!-- Tipos de Documento -->
                        <a href="{{ route('tipos-documento.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('tipos-documento.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Tipos de Documento
                        </a>
                        
                        <!-- Tipos de Permiso -->
                        <a href="{{ route('tipos-permiso.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('tipos-permiso.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Tipos de Permiso
                        </a>
                        
                        <!-- Prioridades -->
                        <a href="{{ route('prioridades.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('prioridades.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Prioridades
                        </a>
                        
                        <!-- Tipos de Alerta -->
                        <a href="{{ route('tipos-alerta.index') }}" 
                           @click="if (window.innerWidth < 1024) sidebarOpen = false"
                           class="flex items-center py-2 px-4 text-sm text-gray-600 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200 {{ request()->routeIs('tipos-alerta.*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            Tipos de Alerta
                        </a>
                    </div>
                </div>
            </div>
        </nav>

    </div>

    <!-- Botón para abrir sidebar en móvil -->
    <button @click="sidebarOpen = true" 
            class="fixed top-4 left-4 z-40 p-2 bg-indigo-600 text-white rounded-md lg:hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>
