<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg border border-gray-100 dark:border-gray-700/50">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-6 border-b border-gray-100 dark:border-gray-700/60 pb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Modifique o nome da categoria abaixo para atualizar o sistema do blog.</p>
                    </div>

                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Nome da Categoria
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" value="{{ old('name', $categoria->name) }}" placeholder="Ex: Tendências, Cuidados, Cortes..."
                                           class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-300 focus:border-amber-500 focus:ring focus:ring-amber-500/20 transition duration-150 placeholder-gray-400 dark:placeholder-gray-500 py-2.5 px-3">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-4 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-end space-x-4">
                            
                            <a href="{{ route('categorias.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transition duration-150">
                                Cancelar
                            </a>

                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold uppercase tracking-wider rounded-md shadow-sm transition ease-in-out duration-150">
                                Salvar Alterações
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>